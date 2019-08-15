<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Customer=DB::select('select * from tblCustomer');
        return view('masterCustomer.Customer',compact('Customer'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('masterCustomer.Customertambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Customer::create([
            'Kode_Customer'=>request('Kode_Customer'),
            'Nama_Customer'=>request('Nama_Customer'),
            'Grup_Customer'=>request('Grup_Customer'),
            'Contact_Person'=>request('Contact_Person'),
            'Telp_Customer'=>request('Telp_Customer'),
            'Alamat_Customer'=>request('Alamat_Customer'),
            'Jatuh_Tempo'=>request('Jatuh_Tempo'),

            
            
        ]);

        return redirect('/Customer')->with('status','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $Customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $item=Customer::where('IDCustomer',$id)->first();
         return view('masterCustomer.Customerubah',compact('item'));
         // echo $Customer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Customer::where('IDCustomer',$id)->update([
            'Kode_Customer'=>request('Kode_Customer'),
            'Nama_Customer'=>request('Nama_Customer'),
            'Grup_Customer'=>request('Grup_Customer'),
            'Contact_Person'=>request('Contact_Person'),
            'Telp_Customer'=>request('Telp_Customer'),
            'Alamat_Customer'=>request('Alamat_Customer'),
            'Jatuh_Tempo'=>request('Jatuh_Tempo'),
            
            
        ]);

        return redirect('/Customer')->with('status','berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $Customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::where('IDCustomer',$id)->delete();
         return redirect('/Customer')->with('status','berhasil menghapus data');
    }
}
