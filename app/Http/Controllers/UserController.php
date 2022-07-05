<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(auth()->user()->id);
        $paketsatpam = Barang::where('status', 'satpam')->count();
        $paketmusyrif = Barang::where('status', 'musyrif')->count();
        $paketditerima = Barang::where('status', 'selesai')->count();
        $pakettanggal = Barang::where('tanggal_input', date('Y-m-d'))->count();
       
        
        
        return view('user.index', compact('paketsatpam', 'paketmusyrif', 'pakettanggal', 'paketditerima', 'user'));
    }

    public function manageuser(Request $request)
    {
        if(auth()->user()->role !== 'Admin'){
            abort(403);
        }
        $user = User::find(auth()->user()->id);
        $keyword = $request->cari;
        $users = User::where('name', 'like', "%" . $keyword . "%")->paginate(10);

        return view('user.manageuser', compact('users', 'user'));
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
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('1234'),
            'role' => $request->role,
        ]);
         Alert::success('Success', "User {$request->name} Dengan Role ({$request->role}) Berhasil Ditambahkan");
        // dd($request);
        return redirect()->back();
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
        $user = User::find($id);
        $user->update([
            'password' => Hash::make('1234'),
        ]);
        $user->save();
        Alert::success('Success', "Password Akun {$user->name} berhasil di reset");
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $user = User::find($id);
        Alert::success('Success', "Akun {$user->name} berhasil di hapus");
        $user->delete();
        return back();
    }
}