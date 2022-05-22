<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('supplier')->paginate(5);
        return view('pages.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $suppliers = Supplier::all();
        return view('pages.products.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|unique:products',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
            'foto' => 'required|file|image|mimes:jpeg,png|max:100'
        ]);

        $data = $request->all();
        $data['foto'] = $request->file('foto')->store(
            'assets/produk',
            'public'
        );

        Product::create($data);
        return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::with('supplier')->findOrFail($id);
        $suppliers = Supplier::all();
        return view('pages.products.edit', compact('product', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'stok' => 'required',
        ]);

        $data = $request->all();

        if ($request->has('foto')) {
            $request->validate([
                'foto' => 'required|file|image|mimes:jpeg,png|max:100'
            ]);
            $data['foto'] = $request->file('foto')->store(
                'assets/produk',
                'public'
            );
        }

        $selectedProduct = Product::findOrFail($id);
        $selectedProduct->update($data);

        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index');
    }

    public function search(Request $request)
    {
        $products = Product::where('nama', $request->search)->orWhere('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        return view('pages.products.index', compact('products'));
    }

    public function sorting(Request $request)
    {
        $sort = $request->all();

        if ($request->sortby === 'terendah') {
            $products = Product::orderBy('harga_beli', 'asc')->paginate(5);
        } else if ($request->sortby === 'tertinggi') {
            $products = Product::orderBy('harga_beli', 'desc')->paginate(5);
        } else {
            $products = Product::with('supplier')->latest()->paginate(5);
        }

        return view('pages.products.index', compact('products', 'sort'));
    }

    public function print()
    {
        $products = Product::with('supplier')->get();
        return view('pages.products.laporan', compact('products'));
    }
}
