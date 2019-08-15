<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Penjualan;
use App\Gudang;
use App\Barang;
use App\AkunPembayaran;

use Illuminate\Http\Request;
use DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Penjualan=DB::select('select * from vlistPenjualan');;
        return view('transaksiPenjualan.Penjualan',compact('Penjualan'));
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

          }

 public function comboCustomer()
    {

       
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

          }


    public function create()
    {
        
         $Customer = Customer::orderBy('IDCustomer','Asc')->get();
         $Gudang = Gudang::orderBy('IDGudang','Asc')->get();
         // $Barang = Barang::orderBy('IDBarang','Asc')->get();
         $Barang=DB::table('vlistbarang')->get();
         $AkunPembayaran = AkunPembayaran::orderBy('IDAkunPembayaran','Asc')->get();



        return view("transaksiPenjualan.Penjualantambah", compact('Customer','Gudang','Barang','AkunPembayaran'));
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
            'Nomor' => 'required|unique:tblPenjualan'
        ]);

        Penjualan::create([
            'Nomor'=>request('Nomor'),
            'Tanggal'=>request('Tanggal'),
            'IDCustomer'=>request('IDCustomer'),
            'No_PO_Customer'=>request('No_PO_Customer'),
            'Tgl_Jatuh_Tempo'=>request('Tgl_Jatuh_Tempo'),
            'Jatuh_Tempo'=>request('Jatuh_Tempo'),
            'IDGudang'=>request('IDGudang'),
            'Jenis_Diskon'=>request('Jenis_Diskon'),
            'Jenis_Faktur'=>request('Jenis_Faktur'),
            'Keterangan'=>request('Keterangan'),
            'Total'=>request('Total'),
            'Total_Diskon'=>request('Total_Diskon'),
            'Total_Ppn'=>request('Total_Ppn'),
            'Grandtotal'=>request('Grandtotal'),
            'Pembayaran'=>request('Pembayaran'),
            'Sisa'=>request('Sisa'),
            'Status_Transaksi'=>('Status_Transaksi'),


            
            
        ]);

        return redirect('/Penjualan')->with('status','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Penjualan  $Penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $Penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Penjualan  $Penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=DB::table('vlistPenjualan')->where ('IDPenjualan',$id)->first();

         $PilihCustomer = Customer::orderBy('IDCustomer','Asc')->get();
         $PilihGudang = Gudang::orderBy('IDGudang','Asc')->get();

         
         return view('TransaksiPenjualan.Penjualanubah',compact('item','PilihCustomer','PilihGudang'));
         // echo $Penjualan;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Penjualan  $Penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Penjualan::where('IDPenjualan',$id)->update([
            'Nomor'=>request('Nomor'),
            'Tanggal'=>request('Tanggal'),
            'IDCustomer'=>request('IDCustomer'),
            'No_PO_Customer'=>request('No_PO_Customer'),
            'Tgl_Jatuh_Tempo'=>request('Tgl_Jatuh_Tempo'),
            'Jatuh_Tempo'=>request('Jatuh_Tempo'),
            'IDGudang'=>request('IDGudang'),
            'Jenis_Diskon'=>request('Jenis_Diskon'),
            'Jenis_Faktur'=>request('Jenis_Faktur'),
            'Keterangan'=>request('Keterangan'),
            'Total'=>request('Total'),
            'Total_Diskon'=>request('Total_Diskon'),
            'Total_Ppn'=>request('Total_Ppn'),
            'Grandtotal'=>request('Grandtotal'),    
            'Pembayaran'=>request('Pembayaran'),
            'Sisa'=>request('Sisa'),
            'Status_Transaksi'=>('Status_Transaksi'),
            
            
        ]);

        return redirect('/Penjualan')->with('status','berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penjualan  $Penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Penjualan::where('IDPenjualan',$id)->delete();
         return redirect('/Penjualan')->with('status','berhasil menghapus data');
    }




}
