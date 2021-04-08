<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use App\Models\Kelas;
use App\Models\Paket;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // Upload Photo Profile
    function formRegister()
    {
        $user = auth()->user();
        $kelas = Kelas::get();
        $paket = Paket::get();
        $jenjang = Jenjang::get();
        $data['registrasi'] = DB::table('data_registrasi')
            ->where('data_registrasi.id_user', $user->id)
            ->join('jenjang', 'data_registrasi.id_jenjang', '=', 'jenjang.id')
            ->join('kelas', 'data_registrasi.id_kelas', '=', 'kelas.id')
            ->join('paket', 'data_registrasi.id_paket', '=', 'paket.id')
            ->select('data_registrasi.*', 'jenjang.jenjang', 'kelas.kelas', 'paket.jenis_paket', 'paket.harga')
            ->first();

        $data['transaksi'] = DB::table('transaksi')
            ->where('id_user', $user->id)
            ->first();
        return view('dashboard.users.formRegister', $data, compact('kelas', 'paket', 'jenjang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('assets/imageProfile'), $imageName);

        $data =  User::findOrFail($id);
        $data->update([
            'image' => $imageName,
            'alamat' => $request->alamat,
            'state' => 1,
        ]);
        return redirect()->route('formRegister');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}