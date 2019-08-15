<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use DB;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Supplier=DB::select('select * from tblSupplier');
        return view('masterSupplier.Supplier',compact('Supplier'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterSupplier.Suppliertambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Supplier::create([
            'Kode_Supplier'=>request('Kode_Supplier'),
            'Nama_Supplier'=>request('Nama_Supplier'),
            'Grup_Supplier'=>request('Grup_Supplier'),
            'Contact_Person'=>request('Contact_Person'),
            'Telp_Supplier'=>request('Telp_Supplier'),
            'Alamat_Supplier'=>request('Alamat_Supplier'),
            'Jatuh_Tempo'=>request('Jatuh_Tempo'),

            
            
        ]);
        
        return redirect('/Supplier')->with('status','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $Supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $item=Supplier::where('IDSupplier',$id)->first();
         return view('masterSupplier.Supplierubah',compact('item'));
         // echo $Supplier;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Supplier::where('IDSupplier',$id)->update([
            'Kode_Supplier'=>request('Kode_Supplier'),
            'Nama_Supplier'=>request('Nama_Supplier'),
            'Grup_Supplier'=>request('Grup_Supplier'),
            'Contact_Person'=>request('Contact_Person'),
            'Telp_Supplier'=>request('Telp_Supplier'),
            'Alamat_Supplier'=>request('Alamat_Supplier'),
            'Jatuh_Tempo'=>request('Jatuh_Tempo'),
            
            
        ]);

        return redirect('/Supplier')->with('status','berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $Supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Supplier::where('IDSupplier',$id)->delete();
         return redirect('/Supplier')->with('status','berhasil menghapus data');
    }
}
