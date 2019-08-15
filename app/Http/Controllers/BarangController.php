<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Satuan;
use App\Barang;
use Illuminate\Http\Request;
use DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {

        $this->middleware('auth');
    // dd(Auth::user());

    }

    public function cekakses()
    {
    $akses=DB::select('SELECT
    `users`.`id`
    , `tblmenu`.`Nama_Menu`
    FROM
    `dtu_laravel`.`tblroledetail`
    INNER JOIN `dtu_laravel`.`tblrole` 
        ON (`tblroledetail`.`IDRole` = `tblrole`.`IDRole`)
    INNER JOIN `dtu_laravel`.`users` 
        ON (`users`.`IDRole` = `tblrole`.`IDRole`)
    INNER JOIN `dtu_laravel`.`tblmenu` 
        ON (`tblmenu`.`IDMenu` = `tblroledetail`.`IDMenu`)
        WHERE id = '.Auth::id().' and Nama_Menu="Barang"' );

    if (!$akses){
        return abort(404);

        }

    }


    public function index()
    {
        $this->cekakses();
        $Barang=DB::select('select * from vlistbarang');
        return view('masterBarang.Barang',compact('Barang'));
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

          }



    public function create()
    {
        
         $Satuan = Satuan::orderBy('IDSatuan','Asc')->get();
        return view("masterbarang.Barangtambah", compact("Satuan"));
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
            'Kode_Barang' => 'required|unique:tblbarang'
        ]);

        Barang::create([
            'Kode_Barang'=>request('Kode_Barang'),
            'Nama_Barang'=>request('Nama_Barang'),
            'IDSatuan'=>request('IDSatuan'),
            'Harga_Barang'=>request('Harga_Barang'),
            'Grup_Barang'=>request('Grup_Barang'),
            
            
        ]);

        return redirect('/Barang')->with('status','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $Barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=DB::table('vlistbarang')->where ('IDBarang',$id)->first();

         $PilihSatuan = Satuan::orderBy('IDSatuan','Asc')->get();
         
         return view('masterBarang.Barangubah',compact('item'),compact('PilihSatuan'));
         // echo $Barang;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Barang::where('IDBarang',$id)->update([
            'Kode_Barang'=>request('Kode_Barang'),
            'Nama_Barang'=>request('Nama_Barang'),
            'IDSatuan'=>request('IDSatuan'),
            'Harga_Barang'=>request('Harga_Barang'),
            'Grup_Barang'=>request('Grup_Barang'),
            
            
        ]);

        return redirect('/Barang')->with('status','berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $Barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::where('IDBarang',$id)->delete();
         return redirect('/Barang')->with('status','berhasil menghapus data');
    }


    public function export(request $request) {

        $Barang=DB::select('select * from vlistbarang');

        if (request('print') == "PRINT") {
            return view('masterbarang.barangprint', compact('Barang'));
        } else if (request('excel') == "to EXCEL") {
            return view('masterbarang.barangexcel', compact('Barang'));
        } else if (request('pdf') == "to PDF") {
            $pdf = PDF::loadView('masterbarang.barangpdf', compact('Barang'));
            return $pdf->download('Master Data Barang.pdf');
        }
    }


}
