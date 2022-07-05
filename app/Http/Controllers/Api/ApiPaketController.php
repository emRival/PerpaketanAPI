<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Barang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response as HttpFondationResponse;

class ApiPaketController extends Controller
{
    public function getAllPaket() {
        $paket = Barang::all();

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Mendapatkan Semua Data Paket",
            'result' => $paket
        ], HttpFondationResponse::HTTP_OK);
    }

    public function getPaketById($id) {
        $paket = Barang::find($id);

        if (!$paket) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data Paket Tidak Ditemukan",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Mendapatkan Data Paket",
            'result' => $paket
        ], HttpFondationResponse::HTTP_OK);
    }

    public function createPaket(Request $request) {
        $validator = Validator::make($request->all(), [
            'nama_penerima' => 'required',
            'ekspedisi' => 'required',
            'status' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data Paket Gagal Ditambahkan",
                'result' => $validator->errors()
            ], HttpFondationResponse::HTTP_BAD_REQUEST);
        }

        $paket = Barang::create([
            'nama_penerima' => $request->nama_penerima,
            'ekspedisi' => $request->ekspedisi,
            'status' => $request->status,
            'tanggal_input' => $request->tanggal_input = date('Y-m-d'),
            'img' => $request->file('img')->store('img-data'),
        ]);

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Menambahkan Data Paket",
            'result' => $paket
        ], HttpFondationResponse::HTTP_CREATED);
    }

    public function updatePaket(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'nama_penerima' => 'required',
            'ekspedisi' => 'required',
            'status' => 'required',
            'img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data Paket Gagal Diupdate",
                'result' => $validator->errors()
            ], HttpFondationResponse::HTTP_BAD_REQUEST);
        }

        $paket = Barang::find($id);

        if (!$paket) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data Paket Tidak Ditemukan",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }

        if($request->hasFile('img')) {
            Storage::delete($paket->img);
            $paket->update([
            'nama_penerima' => $request->nama_penerima,
            'ekspedisi' => $request->ekspedisi,
            'status' => $request->status,
            'tanggal_input' => $request->tanggal_input = date('Y-m-d'),
            'penerima_paket' => $request->penerima_paket,
            'img' => $request->file('img')->store('img-data'),
        ]);
        } else {
            $paket->update([
            'nama_penerima' => $request->nama_penerima,
            'ekspedisi' => $request->ekspedisi,
            'status' => $request->status,
            'tanggal_input' => $request->tanggal_input = date('Y-m-d'),
            'penerima_paket' => $request->penerima_paket,
        ]);
        }

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Mengupdate Data Paket",
            'result' => $paket
        ], HttpFondationResponse::HTTP_OK);
    }

    public function deletePaket($id) {
        $paket = Barang::find($id);

        if (!$paket) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data Paket Tidak Ditemukan",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }
        Storage::delete($paket->img);
        Barang::findOrFail($id)->delete();
        $paket->delete();

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Menghapus Data Paket {$paket->nama_penerima} ",
            'result' => null
        ], HttpFondationResponse::HTTP_OK);
    }

 //login user
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'pesan' => "Email Atau Password Tidak Valid",
                'result' => $validator->errors()
            ], HttpFondationResponse::HTTP_BAD_REQUEST);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return response()->json([
                'status' => 0,
                'pesan' => "User Tidak Valid",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 0,
                'pesan' => "Password Salah",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }

        $token = $user->createToken('Laravel Password Grant Client')->accessToken;

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Login, Selamat Datang {$user->name}",
            'result' => $user,
            
        ], HttpFondationResponse::HTTP_OK);
    }

    //create user with role
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data Gagal Ditambahkan",
                'result' => $validator->errors()
            ], HttpFondationResponse::HTTP_BAD_REQUEST);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make(1234),
        ]);

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Menambahkan Data User",
            'result' => $user
        ], HttpFondationResponse::HTTP_CREATED);
    }

    //delete user
    public function deleteUser($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data User Tidak Ditemukan",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }

        $user->delete();

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Menghapus Data User {$user->name}",
            'result' => null
        ], HttpFondationResponse::HTTP_OK);
    }

    //get paet by status
    public function getPaketByStatus($status)
    {
        $paket = Barang::where('status', $status)->orderBy('created_at', 'desc')->get();

        if (!$paket) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data Paket Tidak Ditemukan",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Menampilkan Data Paket {$status}",
            'result' => $paket
        ], HttpFondationResponse::HTTP_OK);
    }

    //dashboard
    public function dashboard()
    {
        $paket = Barang::all();
        $user = User::all();
        $total_paket = $paket->count();
        $total_user = $user->count();
        $total_paket_satpam = $paket->where('status', 'satpam')->count();
        $total_paket_musyrif = $paket->where('status', 'musyrif')->count();
        $total_paket_selesai = $paket->where('status', 'selesai')->count();
        $total_paket_hari_ini = $paket->where('tanggal_input', date('Y-m-d'))->count();
  

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Menampilkan Data Dashboard",
            'result' => [
                'total_paket' => $total_paket,
                'total_user' => $total_user,
                'total_paket_satpam' => $total_paket_satpam,
                'total_paket_musyrif' => $total_paket_musyrif,
                'total_paket_selesai' => $total_paket_selesai,
                'total_paket_hari_ini' => $total_paket_hari_ini,
            ]
        ], HttpFondationResponse::HTTP_OK);
    }

    //reset password by id
    public function resetPassword($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data User Tidak Ditemukan",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }

        $user->password = Hash::make(1234);
        $user->save();

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Mereset Password User {$user->name}",
            'result' => null
        ], HttpFondationResponse::HTTP_OK);
    }

    //change password by id
    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data User Tidak Ditemukan",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'password_lama' => 'required',
            'password_baru' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data Gagal Ditambahkan",
                'result' => $validator->errors()
            ], HttpFondationResponse::HTTP_BAD_REQUEST);
        }

        if(!Hash::check($request->password_lama, $user->password)){
            return response()->json([
                'status' => 0,
                'pesan' => "Password Lama Salah",
                'result' => null
            ], HttpFondationResponse::HTTP_BAD_REQUEST);
        }

        if($request->password_baru == $request->password_lama){
            return response()->json([
                'status' => 0,
                'pesan' => "Password Baru Tidak Boleh Sama Dengan Password Lama",
                'result' => null
            ], HttpFondationResponse::HTTP_BAD_REQUEST);
        }

        $user->password = Hash::make($request->password_baru);
        $user->save();

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Merubah Password User {$user->name}",
            'result' => null
        ], HttpFondationResponse::HTTP_OK);
    }

    //get paket landing
    public function getPaketLanding()
    {

         $paket = Barang::whereIn('status',  ['satpam','musyrif'])->orderBy('created_at', 'desc')->get();
        $paketselesai = Barang::where('status', 'selesai')->where('tanggal_input', date('Y-m-d'))->orderBy('created_at', 'desc')->get();



        if (!$paket) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data Paket Tidak Ditemukan",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Menampilkan Data Paket Landing",
            'result' =>[
                'paket' => $paket,
                'paketselesai' => $paketselesai,
            ]
        ], HttpFondationResponse::HTTP_OK);
    }

    // get all user
    public function getAllUser()
    {
        $user = User::all();

        if (!$user) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data User Tidak Ditemukan",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Menampilkan Data User",
            'result' => $user
        ], HttpFondationResponse::HTTP_OK);
    }

    // search paket by name
    public function searchPaketByName(Request $request)
    {
        $paket = Barang::where('nama_penerima', 'like', "%". $request->nama_penerima ."%")->get();

        if (!$paket) {
            return response()->json([
                'status' => 0,
                'pesan' => "Data Paket Tidak Ditemukan",
                'result' => null
            ], HttpFondationResponse::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 1,
            'pesan' => "Berhasil Menampilkan Data Paket {$request->nama_penerima}",
            'result' => $paket
        ], HttpFondationResponse::HTTP_OK);
    }



    

}