<?php

namespace App\Http\Controllers;

use App\Satuan;
use Illuminate\Http\Request;
use DB;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Satuan=DB::select('select * from tblSatuan');
        return view('masterSatuan.Satuan',compact('Satuan'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterSatuan.Satuantambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Satuan::create([
            'Satuan'=>request('Satuan'),
    
        ]);

        return redirect('/Satuan')->with('status','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Satuan  $Satuan
     * @return \Illuminate\Http\Response
     */
    public function show(Satuan $Satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Satuan  $Satuan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $item=Satuan::where('IDSatuan',$id)->first();
         return view('masterSatuan.Satuanubah',compact('item'));
         // echo $Satuan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Satuan  $Satuan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Satuan::where('IDSatuan',$id)->update([
            'Satuan'=>request('Satuan'),      
        ]);

        return redirect('/Satuan')->with('status','berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Satuan  $Satuan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Satuan::where('IDSatuan',$id)->delete();
         return redirect('/Satuan')->with('status','berhasil menghapus data');
    }
}
