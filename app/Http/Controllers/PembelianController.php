<?php

namespace App\Http\Controllers;

use App\Supplier;
use App\Pembelian;
use App\Gudang;
use App\Barang;
use App\AkunPembayaran;
use App\PembelianTotal;
use App\PembelianDetail;
Use App\PembelianPembayaran;

use Illuminate\Http\Request;
use DB;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Pembelian=DB::select('select * from vlistPembelian');;
        return view('transaksiPembelian.Pembelian',compact('Pembelian'));
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

          }

 public static function autonumber()
    {
       $ln = DB::table('tblpembelian')->orderBy('nomor','desc')->first();
        if($ln){
            $new_nomor = substr($ln->nomor, -4,4)+1;
            $new_nomor = substr('0000'.$new_nomor,-4,4);
        }else{
            $new_nomor = '0001';
        }
            $new_nomor1 = 'PB/'.date('y/m/').$new_nomor;

            return $new_nomor1;
    }


    public function create()
    {
        
         $Supplier = Supplier::orderBy('IDSupplier','Asc')->get();
         $Gudang = Gudang::orderBy('IDGudang','Asc')->get();
         // $Barang = Barang::orderBy('IDBarang','Asc')->get();
         $Barang=DB::table('vlistbarang')->get();
         $AkunPembayaran = AkunPembayaran::orderBy('IDAkunPembayaran','Asc')->get();



        return view("transaksiPembelian.Pembeliantambah", compact('Supplier','Gudang','Barang','AkunPembayaran'));
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
            'Nomor' => 'required|unique:tblPembelian'
        ]);


        $dataPembelian = [
            'Nama_Pembelian'=>$request->Nama_Pembelian,
            'Keterangan'=>$request->Keterangan,
            'Nomor'=>$request->Nomor,
            'Tanggal'=>$request->Tanggal,
            'IDSupplier'=>$request->IDSupplier,
            'No_SJ_Supplier'=>$request->No_SJ_Supplier,
            'Tgl_Jatuh_Tempo'=>$request->Tgl_Jatuh_Tempo,
            'Jatuh_Tempo'=>$request->Jatuh_Tempo,
            'IDGudang'=>$request->IDGudang,
            'Jenis_Faktur'=>$request->Jenis_Faktur,
            'Keterangan'=>$request->Keterangan,
  
        ];

        $idPembelian = Pembelian::create($dataPembelian);

        if($idPembelian){
            $dataPembelianDetail = array();
           

            for($i = 0 ; $i < $jmlmenu; $i++){


                $dataPembelianDetail[] = array(
                    'IDPembelian' => $idPembelian->IDPembelian,
                    'IDBarang'=> $request->IDBarang[$i],
                    'IDSatuan'=> $request->IDSatuan[$i],
                    'No_Seri'=> $request->No_Seri[$i],
                    'Qty'=> $request->Qty[$i],
                    'Harga'=> $request->Harga[$i],
                    'Diskon'=> $request->Diskon[$i],
                    'Nilai_Diskon'=> $request->Nilai_Diskon[$i],
                    'Subtotal'=> $request->Subtotal[$i],
                    'created_at' => date('Y-m-d'),
                    'updated_at' => date('Y-m-d')
                );
            }

            $idPembeliandetail = PembelianDetail::insert($dataPembelianDetail);


        PembelianTotal::create([
            'IDPembelian'=>request('IDPembelian'),
            'Total'=>request('Total'),
            'Total_Diskon'=>request('Total_Diskon'),
            'Total_Dpp'=>request('Total_Dpp'),
            'Total_Ppn'=>request('Total_Ppn'),
            'Grandtotal'=>request('Grandtotal'),
            'Pembayaran'=>request('Pembayaran'),
            'Sisa'=>request('Sisa'),      
        ]);

        return redirect('/Pembelian')->with('status','berhasil menambah data');
    }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Pembelian  $Pembelian
     * @return \Illuminate\Http\Response
     */
    public function show(Pembelian $Pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pembelian  $Pembelian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item=DB::table('vlistPembelian')->where ('IDPembelian',$id)->first();

         $PilihSupplier = Supplier::orderBy('IDSupplier','Asc')->get();
         $PilihGudang = Gudang::orderBy('IDGudang','Asc')->get();

         
         return view('TransaksiPembelian.Pembelianubah',compact('item','PilihSupplier','PilihGudang'));
         // echo $Pembelian;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pembelian  $Pembelian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Pembelian::where('IDPembelian',$id)->update([
            'Nomor'=>request('Nomor'),
            'Tanggal'=>request('Tanggal'),
            'IDSupplier'=>request('IDSupplier'),
            'No_SJ_Supplier'=>request('No_SJ_Supplier'),
            'Tgl_Jatuh_Tempo'=>request('Tgl_Jatuh_Tempo'),
            'Jatuh_Tempo'=>request('Jatuh_Tempo'),
            'IDGudang'=>request('IDGudang'),
            'Jenis_Faktur'=>request('Jenis_Faktur'),
            'Keterangan'=>request('Keterangan'),
            
            
        ]);

       PembelianTotal::where('IDPembelian',$id)->delete();

       PembelianTotal::create([
            'IDPembelian'=>request($id),
            'Total'=>request('Total'),
            'Total_Diskon'=>request('Total_Diskon'),
            'Total_Dpp'=>request('Total_Dpp'),
            'Total_Ppn'=>request('Total_Ppn'),
            'Grandtotal'=>request('Grandtotal'),
            'Pembayaran'=>request('Pembayaran'),
            'Sisa'=>request('Sisa'),      
        ]);

        return redirect('/Pembelian')->with('status','berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pembelian  $Pembelian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pembelian::where('IDPembelian',$id)->delete();
         return redirect('/Pembelian')->with('status','berhasil menghapus data');
    }




}
