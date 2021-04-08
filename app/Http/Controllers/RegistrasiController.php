<?php

namespace App\Http\Controllers;

use App\Exports\RegistrasiExport;
use App\Models\Registrasi;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use PDF;
use Maatwebsite\Excel\Facades\Excel;

class RegistrasiController extends Controller
{

    public function index()
    {
        $data['registrasi'] = DB::table('data_registrasi')
            ->join('users', 'data_registrasi.id_user', '=', 'users.id')
            ->join('jenjang', 'data_registrasi.id_jenjang', '=', 'jenjang.id')
            ->join('kelas', 'data_registrasi.id_kelas', '=', 'kelas.id')
            ->join('paket', 'data_registrasi.id_paket', '=', 'paket.id')
            ->join('transaksi', 'data_registrasi.id', '=', 'transaksi.id_registrasi')
            ->select('data_registrasi.*', 'jenjang.jenjang', 'kelas.kelas', 'paket.jenis_paket', 'paket.harga', 'users.name', 'users.email', 'users.image', 'users.alamat', 'transaksi.status', 'transaksi.bukti')
            ->get();
        return view('admin.registrasi.list', $data);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $data = Registrasi::create([
            'id_user' => $request->userID,
            'id_jenjang' => $request->jenjang,
            'asal_sekolah' => $request->sekolah,
            'id_kelas' => $request->kelas,
            'id_paket' => $request->paket,
        ]);
        User::where('id', $request->userID)->update(['state' => 2]);
        if ($data) return redirect()->route('formRegister');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $data = Transaksi::findOrFail($id);
        $data->update(['status' => 1]);
        if ($data) return redirect()->route('registrasi.index');
    }

    public function destroy($id)
    {
        //
    }

    function cetakKartu($id)
    {
        $data['registrasi'] = DB::table('data_registrasi')
            ->join('users', 'data_registrasi.id_user', '=', 'users.id')
            ->join('jenjang', 'data_registrasi.id_jenjang', '=', 'jenjang.id')
            ->join('kelas', 'data_registrasi.id_kelas', '=', 'kelas.id')
            ->join('paket', 'data_registrasi.id_paket', '=', 'paket.id')
            ->join('transaksi', 'data_registrasi.id', '=', 'transaksi.id_registrasi')
            ->select('data_registrasi.*', 'jenjang.jenjang', 'kelas.kelas', 'paket.jenis_paket', 'paket.harga', 'users.name', 'users.email', 'users.image', 'users.alamat', 'transaksi.status', 'transaksi.bukti')
            ->where('data_registrasi.id', $id)
            ->first();

        $pdf = PDF::loadview('dashboard/users/cetak/kartu', $data);
        return $pdf->download('kartu-pendaftaran.pdf');
    }

    public function export()
    {
        return Excel::download(new RegistrasiExport, 'data_registrasi.xlsx');
    }

    // function tes($id)
    // {
    //     $data['registrasi'] = DB::table('data_registrasi')
    //         ->join('users', 'data_registrasi.id_user', '=', 'users.id')
    //         ->join('jenjang', 'data_registrasi.id_jenjang', '=', 'jenjang.id')
    //         ->join('kelas', 'data_registrasi.id_kelas', '=', 'kelas.id')
    //         ->join('paket', 'data_registrasi.id_paket', '=', 'paket.id')
    //         ->join('transaksi', 'data_registrasi.id', '=', 'transaksi.id_registrasi')
    //         ->select('data_registrasi.*', 'jenjang.jenjang', 'kelas.kelas', 'paket.jenis_paket', 'paket.harga', 'users.name', 'users.email', 'users.image', 'users.alamat', 'transaksi.status', 'transaksi.bukti')
    //         ->where('data_registrasi.id', $id)
    //         ->first();

    //     return view('dashboard/users/cetak/kartu', $data);
    // }
}