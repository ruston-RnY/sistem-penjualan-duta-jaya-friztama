<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::orderBy('id', 'desc')->paginate(5);
        return view('pages.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.suppliers.create');
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
            'nama' => 'required|min:5',
            'email' => 'required|email',
            'alamat' => 'required|min:15',
            'telpon' => 'required|min:5'
        ]);

        $data = $request->all();
        Supplier::create($data);

        return redirect()->route('suppliers.index');
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
        $supplier = Supplier::findOrFail($id);
        return view('pages.suppliers.edit', compact('supplier'));
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
            'nama' => 'required|min:5',
            'email' => 'required|email',
            'alamat' => 'required|min:15',
            'telpon' => 'required|min:5'
        ]);

        $data = $request->all();
        $supplier = Supplier::findOrFail($id);

        $supplier->update($data);
        return redirect()->route('suppliers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Supplier::findOrFail($id);
        $data->delete();

        return redirect()->route('suppliers.index');
    }

    public function search(Request $request)
    {
        $suppliers = Supplier::where('nama', $request->search)->orWhere('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);

        return view('pages.suppliers.index', compact('suppliers'));
    }

    public function sorting(Request $request)
    {
        $sort = $request->all();

        if ($request->sortby === 'a-z') {
            $suppliers = Supplier::orderBy('nama', 'asc')->paginate(5);
        } else if ($request->sortby === 'z-a') {
            $suppliers = Supplier::orderBy('nama', 'desc')->paginate(5);
        } else {
            $suppliers = Supplier::latest()->paginate(5);
        }

        return view('pages.suppliers.index', compact('suppliers', 'sort'));
    }

    public function print()
    {
        $suppliers = Supplier::orderBy('id', 'desc')->get();
        return view('pages.suppliers.laporan', compact('suppliers'));
    }
}
