<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenjangController extends Controller
{

    public function index()
    {
        $data['jenjang'] = DB::table('jenjang')->get();
        return view('admin.jenjang.list', $data);
    }

    function listKelas($id)
    {
        $data['jenjang'] = DB::table('jenjang')->get();
        $data['kelas'] = DB::table('kelas')->join('jenjang', 'kelas.id_jenjang', '=', 'jenjang.id')
            ->where('kelas.id_jenjang', $id)
            ->select('kelas.*', 'jenjang.jenjang')
            ->get();
        return view('admin.kelas.list', $data);
    }


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
        $data = Jenjang::create(['jenjang' => $request->jenjang]);
        if ($data) return redirect()->route('jenjang.index');
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
        //
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