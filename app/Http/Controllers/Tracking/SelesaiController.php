<?php

namespace App\Http\Controllers\Tracking;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class SelesaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $user = User::find(auth()->user()->id);
        $barang = Barang::where('status', 'selesai')->orderBy('updated_at', 'desc')->paginate(10);
        return view('tracking.diambil', compact( 'barang', 'user'));
    }

    public function search(Request $request)
    {
        // https://www.indeveloper.id/2021/03/tutorial-laravel-cara-membuat-pencarian.html
      
        $keyword = $request->cari;
        $barang = Barang::where('nama_barang', 'like', "%" . $keyword . "%")->paginate(5);
        return view('tracking.diambil', compact( 'barang'));
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $barang = Barang::find($id);
        Storage::delete($barang->img);
        Barang::findOrFail($id)->delete();
        
        Alert::success('Success', "Data {$barang->nama_penerima} berhasil di hapus");
        $barang->delete();
        return back();     
    }

}