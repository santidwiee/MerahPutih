<?php

namespace App\Http\Controllers;

use App\Identity;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class FormIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        if($cari = $request->pencarian){
            $data = Identity::where('kecamatan','like','%'.$cari.'%')
                        ->orWhere('nama', 'like', '%'.$cari.'%')
                        ->orWhere('umur', 'like', '%'.$cari.'%')->paginate(5);
        }
        
        else{
            $data = Identity::paginate(5);
        }
     
        return view('form.dashboard',['dataidentity' => $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('form.tambahdata');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = Validator::make($request->all(), [
            'nama' => 'required|max:20',
            'username' => 'required|max:20|regex:/(^[A-Za-z0-9]+$)+/',
            'email' => 'required|max:100|email',
            'password' => 'required|max:30|regex:/(^[A-Za-z0-9@ ()%,:<>?!*&-]+$)+/',
            'alamat' => 'string',
            'kecamatan' => 'string',
            'kota' => 'string',
            'tanggallahir' => 'required|date',
            'kecamatan' => 'required',
            'umur' => 'required',
            'telephone' => 'required|max:14',
            'foto' => 'image|mimes:jpg,jpeg|max:2000000|dimensions:max_width=1920,max_height=720'
         ], [
            'nama.required' => 'Wajib diisi dan nama tidak boleh sama',
            'nama.max' => 'Maksimal 20 karakter',

            'username.required' => 'Wajib diisi',
            'username.max' => 'Maksimal 20 karakter',
            'username.regex' => 'Hanya kombinasi huruf dan angka',

            'email.required' => 'Wajib diisi',
            'email.max' => 'Maksimal 100 karakter',

            'password.required' => 'Wajib diisi',
            'password.max' => 'Maksimal 30 karakter',
            'password.regex' => 'Kombinasi huruf, angka dan simbol',

            'tanggallahir.required' => 'Wajib diisi',

            'kecamatan.required' => 'Wajib diisi',

            'umur.required' => 'Wajib diisi',

            'telephone.required' => 'Wajib diisi',
            'telephone.max' => 'Maksimal 14 karakter',
            'telephone.regex' => 'Hanya angka saja',

            'foto.mimes' => 'Ekstensi gambar hanya boleh .jpg',
            'foto.max' => 'Maksimum ukuran file 2MB',
            'foto.dimensions' => 'Resolusi gambar maksimum 1920x720'
        ])->validate();


        $identity = new Identity();
        $identity->nama = $request->nama;
        $identity->username = $request->username;
        $identity->email = $request->email;
        $identity->password = $request->password;
        $identity->tanggallahir = $request->tanggallahir;
        $identity->umur = $request->umur;
        $identity->alamat = $request->alamat;
        $identity->kecamatan = $request->kecamatan;
        $identity->kota = $request->kota;
        $identity->telephone = $request->telephone;
        if($request->file('foto')){
            $foto = $request->file('foto')->store('foto_identity', 'public');
            $identity->foto=$foto;
        }
        $identity->save();

        return redirect()->route('identity.index')->with('status', 'berhasil disimpan');
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
        $identityedit = Identity::findOrFail($id);
        return view('form.update', ['dataidentity' => $identityedit]);
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
        $valid = Validator::make($request->all(), [
            'nama' => 'required|max:20',
            'username' => 'required|max:20|regex:/(^[A-Za-z0-9]+$)+/',
            'email' => 'required|max:100|email',
            'password' => 'required|max:30|regex:/(^[A-Za-z0-9@ ()%,:<>?!*&-]+$)+/',
            'alamat' => 'string',
            'kecamatan' => 'string',
            'kota' => 'string',
            'tanggallahir' => 'required|date',
            'kecamatan' => 'required',
            'umur' => 'required',
            'telephone' => 'required|max:14',
            'foto' => 'image|mimes:jpg,jpeg|max:2000000|dimensions:max_width=1920,max_height=720'
         ], [
            'nama.required' => 'Wajib diisi dan nama tidak boleh sama',
            'nama.max' => 'Maksimal 20 karakter',

            'username.required' => 'Wajib diisi',
            'username.max' => 'Maksimal 20 karakter',
            'username.regex' => 'Hanya kombinasi huruf dan angka',

            'email.required' => 'Wajib diisi',
            'email.max' => 'Maksimal 100 karakter',

            'password.required' => 'Wajib diisi',
            'password.max' => 'Maksimal 30 karakter',
            'password.regex' => 'Kombinasi huruf, angka dan simbol',

            'tanggallahir.required' => 'Wajib diisi',

            'kecamatan.required' => 'Wajib diisi',

            'umur.required' => 'Wajib diisi',

            'telephone.required' => 'Wajib diisi',
            'telephone.max' => 'Maksimal 14 karakter',
            'telephone.regex' => 'Hanya angka saja',

            'foto.mimes' => 'Ekstensi gambar hanya boleh .jpg',
            'foto.max' => 'Maksimum ukuran file 2MB',
            'foto.dimensions' => 'Resolusi gambar maksimum 1920x720'
        ])->validate();

        $identity = Identity::findOrFail($id);
        $identity->nama = $request->nama;
        $identity->username = $request->username;
        $identity->email = $request->email;
        $identity->password = $request->password;
        $identity->tanggallahir = $request->tanggallahir;
        $identity->umur = $request->umur;
        $identity->alamat = $request->alamat;
        $identity->kecamatan = $request->kecamatan;
        $identity->kota = $request->kota;
        $identity->telephone = $request->telephone;
        if($request->file('foto')){
            $foto = $request->file('foto')->store('foto_identity', 'public');
            $identity->foto=$foto;
        }
        $identity->save();

        return redirect()->route('identity.index')->with('status', 'berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //hapus satu data saja
    public function destroy($id)
    {
        $dataidentity = Identity::findOrFail($id);
        $dataidentity->delete();

        return redirect()->route('identity.index')->with('status','data berhasil dihapus');
    }

    //hapus beberapa data
    public function deleteSelected(Request $request)
    {
        $dataidentity = $request->input('options');
        Identity::whereIn('id',$dataidentity)->delete();
        // $dataidentity->delete();

        return redirect()->route('identity.index')->with('status','beberapa data berhasil dihapus');
    }

    public function Cari(Request $request){
        // $cari = $request->pencarian;

        // $data = Identity::where('kecamatan','like','%'.$cari.'%')
        //                 ->orWhere('nama', 'like', '%'.$cari.'%')
        //                 ->orWhere('umur', 'like', '%'.$cari.'%')->get();

        if($cari = $request->pencarian){
            $data = Identity::where('kecamatan','like','%'.$cari.'%')
                        ->orWhere('nama', 'like', '%'.$cari.'%')
                        ->orWhere('umur', 'like', '%'.$cari.'%')->paginate(5);
        }
        else{
            $data = Identity::paginate(5);
        }
        
        return view('form.dashboard',['dataidentity' => $data ]);
    }

    public function NullFoto(){
        $data = Identity::where('foto',null)->paginate(5);
        return view('form.dashboard',['dataidentity'=> $data]);
    }
}
