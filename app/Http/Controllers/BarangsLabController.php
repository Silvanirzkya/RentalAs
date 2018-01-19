<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Barang;
use Session;

class BarangsLabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barang = DB::table('barangs')
            ->join('jenis', 'jenis.id','=','barangs.id_jenis')
            ->select('barangs.*','jenis.nama')
            ->where('barangs.id_jenis',1)->get();
        return view('barangs.lab')->with(compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('barangs.createlab');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'kode_barang'     =>'required|unique:barangs,kode_barang',
            'nama_barang'     =>'required|unique:barangs,nama_barang',
            'tgl_masuk'     =>'required',
            'amount'    =>'required|numeric']);

        $barang = new Barang;
        $barang->id_jenis = 1;
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->tgl_masuk = $request->tgl_masuk;
        $barang->amount = $request->amount;
        $barang->save();


        Session::flash("flash_notification",["level"=>"success","message"=>"Berhasil Menyimpan $barang->nama_barang"]);

        return redirect()->route('barangslab.index');
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
        $barang = Barang::find($id);
        return view('barangs.editlab')->with(compact('barang'));
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
        $this->validate($request, [
          'kode_barang'     =>'required|unique:barangs,kode_barang',
            'nama_barang'     =>'required|unique:barangs,nama_barang',
            'tgl_masuk'     =>'required',
            'amount'    =>'required|numeric']);

        $barang = Barang::find($id);
        $barang->update($request->all());


        Session::flash("flash_notification",["level"=>"success","message"=>"Berhasil Menyimpan $barang->nama_barang"]);

        return redirect()->route('barangslab.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $barang = Barang::find($id);
        $barang->delete();

        return redirect()->route('barangslab.index');
    }
}
