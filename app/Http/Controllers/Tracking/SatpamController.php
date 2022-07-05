<?php

namespace App\Http\Controllers\Tracking;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\UploadedFile;

class SatpamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        
          $user = User::find(auth()->user()->id);
        $barang = Barang::where('status', 'satpam')->orderBy('created_at', 'desc')->paginate(10);
        // $keyword = $request->cari;
        // $barang = Barang::where('nama_barang', 'like', "%" . $keyword . "%")->paginate(5);
        return view('tracking.satpam', compact('barang', 'user'));
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
          
        Barang::create([
            'nama_penerima' => $request->nama_penerima,
            'ekspedisi' => $request->ekspedisi,
            'status' => $request->status,
            'tanggal_input' => $request->tanggal_input = date('Y-m-d'),
            'img' => $request->file('img')->store('img-data'),

        ]);

        
    
    
        Alert::success('Success', "Data Barang Berhasil Diinput");
        return redirect('/satpam');
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
        $barang = Barang::find($id);
         if (empty($request->file('img'))) {
            $barang->update([
                'nama_penerima' => $request->nama_penerima,
                'ekspedisi' => $request->ekspedisi,
                'status' => $request->status,
                'penerima_paket' => $request->penerima_paket,
               
            ]);
             Alert::info('Success', "Data Paket {$barang->nama_penerima} Berhasil Di update");
         return redirect('/satpam');
        } else {
            Storage::delete($barang->img);
            $barang->update([
                'nama_penerima' => $request->nama_penerima, 
                'ekspedisi' => $request->ekspedisi,
                'status' => $request->status,
                'penerima_paket' => $request->penerima_paket,
                'img' => $request->file('img')->store('img'),
            ]); 
        }
        dd($request);
        Alert::info('Success', "Data Paket {$barang->nama_penerima} Berhasil Di update");
        return redirect('/satpam');
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
        Storage::delete($barang->img);
        Barang::findOrFail($id)->delete();
        
        Alert::success('Success', "Data {$barang->nama_penerima} berhasil di hapus");
        $barang->delete();
        return back();   
    }

}