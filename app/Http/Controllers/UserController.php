<?php

namespace App\Http\Controllers;

use App\Cabang;
use App\Role;
use App\User;
use App\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cekakses(){
        $akses=DB::select('SELECT * from vakses
            WHERE id = '.Auth::id().' and Nama_Menu="User"');

        if (!$akses){
            return abort(404);
        }else{
            Session::put('lihat', $akses[0]->lihat);
            Session::put('tambah', $akses[0]->tambah);
            Session::put('ubah', $akses[0]->ubah);
            Session::put('hapus', $akses[0]->hapus);
            return $akses;
        }

    }

    public function index(){   
        $User = User::orderBy('id','Desc')->where('is_deleted',0)->with('getcabang','getrole')->get();
        return view('masterUser.User',compact('User'));
      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    }


    public function create(){
        $Cabang = Cabang::orderBy('idcabang','Asc')->get();
        $Role = Role::orderBy('idrole','Asc')->get();
        return view("masterUser.Usertambah", compact("Role","Cabang"));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(request $data)
    {

        $data->validate([
            'name' => 'required|unique:users'
        ]);

        $dataUser = [
            'name'=>request('name'),
            'email'=>request('email'),
            'password'=>Hash::make(request('password')),
            'idrole'=>request('idrole'),
            'idcabang'=>request('idcabang'),
            'is_deleted'=>0,
        ];

        // dd($dataUser);

        User::create($dataUser);

        return redirect('/User')->with('status','berhasil menambah data');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function show(User $User)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $item=DB::table('tbl_User')->where ('id',$id)->first();

        $Menu = Menu::orderBy('idmenu','Asc')->get();
       // dd($item);
        return view('masterUser.Userubah',compact('item','Menu','UserDetail'));
         // echo $User;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataUser = [
            'nama_User'=>request('nama_User'),
            'keterangan'=>request('keterangan'),
            'is_deleted'=>'0'
        ];

        User::where('id',$id)->update($dataUser);

        $rowUserdetail =  count($request->idmenu);
        // Insert User detail
        UserDetail::where('id',$id)->update(['is_deleted'=>1]);


            // $dataUserdetail = array();
        for ($i=0; $i < $rowUserdetail; $i++) {

            $dataUserdetail = [    
                'id'=>$id,
                'idmenu' => request('idmenu')[$i],
                'lihat' => request('lihat')[$i],
                'tambah' => request('tambah')[$i],
                'ubah' => request('ubah')[$i],
                'hapus' => request('hapus')[$i],
                'is_deleted'=>0
            ]; 

            if (request('iddetail')[$i]!=null || request('iddetail')[$i] != ''  ) {
                UserDetail::where('iddetail',request('iddetail')[$i])->update($dataUserdetail);
            } else{                                                                                        
                UserDetail::create($dataUserdetail);
            }

        }
        


        return redirect('/User')->with('status','berhasil ubah data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $User
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::where('id',$id)->update([
            'is_deleted'=>1,
        ]);

        return redirect('/User')->with('status','Data User Telah Dihapus');
    }

}
