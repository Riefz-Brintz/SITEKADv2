<?php

namespace App\Http\Controllers;

use App\SettingPerusahaan;
use Illuminate\Http\Request;
use DB;


class SettingPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $SettingPerusahaan=DB::select('select * from tblSettingPerusahaan');
        return view('SettingPerusahaan',compact('SettingPerusahaan'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('SettingPerusahaantambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        SettingPerusahaan::create([
            'Nama_perusahaan'=>request('Nama_perusahaan'),
            'Alamat_perusahaan'=>request('Alamat_perusahaan'),
            'Telp1_perusahaan'=>request('Telp1_perusahaan'),
            'Telp2_perusahaan'=>request('Telp2_perusahaan'),
            'Email_perusahaan'=>request('Email_perusahaan'),
            'Tunjangan_menikah'=>request('Tunjangan_menikah'),
            'Tunjangan_bpjs'=>request('Tunjangan_bpjs'),

        ]);

        return redirect('/SettingPerusahaan')->with('status','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SettingPerusahaan  $SettingPerusahaan
     * @return \Illuminate\Http\Response
     */
    public function show(SettingPerusahaan $SettingPerusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SettingPerusahaan  $SettingPerusahaan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $item=SettingPerusahaan::where('IDSettingPerusahaan',$id)->first();
         return view('SettingPerusahaanubah',compact('item'));
         // echo $SettingPerusahaan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SettingPerusahaan  $SettingPerusahaan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        SettingPerusahaan::where('IDSettingPerusahaan',$id)->update([
            'Nama_perusahaan'=>request('Nama_perusahaan'),
            'Alamat_perusahaan'=>request('Alamat_perusahaan'),
            'Telp1_perusahaan'=>request('Telp1_perusahaan'),
            'Telp2_perusahaan'=>request('Telp2_perusahaan'),
            'Email_perusahaan'=>request('Email_perusahaan'),
            'Tunjangan_menikah'=>request('Tunjangan_menikah'),
            'Tunjangan_bpjs'=>request('Tunjangan_bpjs'),
        ]);

        return redirect('/SettingPerusahaan')->with('status','berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SettingPerusahaan  $SettingPerusahaan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        SettingPerusahaan::where('IDSettingPerusahaan',$id)->delete();
         return redirect('/SettingPerusahaan')->with('status','berhasil menghapus data');
    }
}
