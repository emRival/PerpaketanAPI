<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(Request $request) {
$i = 1;
      
      
        $search = false;
        $barang = Barang::whereIn('status',  ['satpam','musyrif'])->paginate(5);
        $barangselesai = Barang::where('status', 'selesai')->where('tanggal_input', date('Y-m-d'))->paginate(1);
        
        return view('welcome', compact('barang','barangselesai', 'i', 'search'));
    }


    public function search(Request $request)
    {
        $i = 1;
        $search = true;
        
        $keyword = $request->cari;
        $barang = Barang::where('nama_penerima', 'like', "%" . $keyword . "%")->paginate(10);
    
        return view('welcome', compact('barang', 'search' ,'i'));
    }
}