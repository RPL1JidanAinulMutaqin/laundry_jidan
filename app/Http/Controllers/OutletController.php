<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use App\Exports\OutletExport;
use App\Imports\OutletImport;
use Maatwebsite\Excel\Facades\Excel;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('outlet.index', [
            'outlet' => outlet::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('outlet.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_outlet' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        Outlet::create($validatedData);

        return redirect(request()->segment(1).'/outlet')->with('success', 'New Data has been added!');
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
    public function edit(outlet $outlet)
    {
        return view('outlet.edit',[
            'outlet' => $outlet
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, outlet $outlet)
    {
        $validatedData = $request->validate([
            'nama_outlet' => 'required',
            'alamat' => 'required',
            'telepon' => 'required'
        ]);

        Outlet::where('id', $outlet->id)
            ->update($validatedData);

        return redirect(request()->segment(1).'/outlet')->with('success', 'Data has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $validatedData = Outlet::find($id);
        $validatedData->delete();
        return redirect(request()->segment(1).'/outlet');
    }

    public function exportOutlet()
    {
        return Excel::download(new OutletExport, 'outlet.xlsx');
    }

    public function import(Request $request) {
        $request->validate([
            'file2' => 'file|required|mimes:xlsx',
        ]);

        if ($request) {
            Excel::import(new OutletImport, $request->file('file2'));
        } else {
            return back()->withErrors([
                'file2' => 'file belum terisi',
            ]);
        }

        // return redirect(request()->segment(1).'/paket')->route('paket.index')->with('success', 'Data berhasil diimport!');
        return redirect(request()->segment(1).'/outlet')->with('success', 'Data berhasil diimport!');
    }
}
