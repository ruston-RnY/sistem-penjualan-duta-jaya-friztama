<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::with('produk')->paginate(5);
        return view('pages.transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.transactions.create', compact('products'));
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
            'product_id' => 'required',
            'nama_pembeli' => 'required|min:4',
            'alamat' => 'required|min:10',
            'telpon' => 'required|min:5',
            'tanda_pengenal' => 'required',
            'tanggal_transaksi' => 'required',
            'total_transaksi' => 'required',
        ]);

        $productId = Product::findOrFail($request->product_id);

        Transaction::create([
            'produk_id' => $request->product_id,
            'nama_pembeli' => $request->nama_pembeli,
            'alamat' => $request->alamat,
            'telpon' => $request->telpon,
            'tanda_pengenal' => $request->file('tanda_pengenal')->store(
                'assets/produk',
                'public'
            ),
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'total_transaksi' => $request->total_transaksi,
            'total_harga' => $request->total_transaksi * $productId->harga_jual,
        ]);

        return redirect()->route('transactions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detailTransaction = Transaction::with('produk')->findOrFail($id);
        return view('pages.transactions.detail', compact('detailTransaction'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Transaction::findOrFail($id);
        $data->delete();

        return redirect()->route('transactions.index');
    }

    public function search(Request $request)
    {
        dd($request);
        $transactions = Transaction::with('produk')->whereHas('produk', function ($q) use ($request) {
            $q->where('nama', 'LIKE', '%' . $request->search . '%');
        })->orWhere('nama_pembeli', 'LIKE', '%' . $request->search . '%')->paginate(5);

        return view('pages.transactions.index', compact('transactions'));
    }

    public function sorting(Request $request)
    {
        $sort = $request->all();

        if ($request->sortby === 'terlama') {
            $transactions = Transaction::orderBy('id', 'asc')->paginate(5);
        } else {
            $transactions = Transaction::orderBy('id', 'desc')->paginate(5);
        }

        return view('pages.transactions.index', compact('transactions', 'sort'));
    }
}
