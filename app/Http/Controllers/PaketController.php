<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['paket'] = DB::table('paket')
            ->join('kelas', 'paket.id_kelas', '=', 'kelas.id')
            ->select('paket.*', 'kelas.kelas')
            ->get();
        $data['kelas'] = Kelas::get();
        return view('admin.paket.list', $data);
    }

    function getPaketFromKelas($id)
    {
        $paket = DB::table("paket")
            ->where("id_kelas", $id)
            ->pluck("jenis_paket", "id");
        return json_encode($paket);
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
        $data = Paket::create([
            'jenis_paket' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'pertemuan_belajar' => $request->pertemuan,
            'id_kelas' => $request->kelas,
        ]);
        if ($data) return redirect()->route('paket.index');
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
        $data = Paket::findOrFail($id);
        $data->update([
            'jenis_paket' => $request->jenis,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'pertemuan_belajar' => $request->pertemuan,
            'id_kelas' => $request->kelas,
        ]);
        if ($data) return redirect()->route('paket.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Paket::findOrFail($id);
        $data->delete();
        if ($data) return redirect()->route('paket.index');
    }
}