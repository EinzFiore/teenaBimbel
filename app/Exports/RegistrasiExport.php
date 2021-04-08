<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Support\Facades\DB;

class RegistrasiExport implements FromView
{
    public function view(): View
    {
        $data['registrasi'] = DB::table('data_registrasi')
            ->join('users', 'data_registrasi.id_user', '=', 'users.id')
            ->join('jenjang', 'data_registrasi.id_jenjang', '=', 'jenjang.id')
            ->join('kelas', 'data_registrasi.id_kelas', '=', 'kelas.id')
            ->join('paket', 'data_registrasi.id_paket', '=', 'paket.id')
            ->join('transaksi', 'data_registrasi.id', '=', 'transaksi.id_registrasi')
            ->select('data_registrasi.*', 'jenjang.jenjang', 'kelas.kelas', 'paket.jenis_paket', 'paket.harga', 'users.name', 'users.email', 'users.image', 'users.alamat', 'transaksi.status')
            ->get();
        return view('admin.registrasi.export', $data);
    }
}