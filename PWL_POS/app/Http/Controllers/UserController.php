<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        //$user = UserModel::with('level')->get();
        //dd($user);

        // Tambah data user dengan Eloquent Model
        //$data = [
        //    'username' => 'customer-1',
        //    'nama' => 'Pelanggan',
        //    'password' => Hash::make('12345'),
        //    'level_id' => 4
        //];

        // Tambahkan data ke tabel m_user
        //UserModel::insert($data);

        // Ambil semua data dari tabel m_user
        //$user = UserModel::all();

        // Kirim data ke view 'user'
        //return view('user', ['data' => $user]);

        // tambah data user dengan Eloquent Model
        //$data = [
        //'level_id' => 2,
        //'username' => 'manager_tiga',
        //'nama' => 'Manager 3',
        //'password' => Hash::make('12345')
        //];
        //UserModel::create($data);

        //UserModel::where('username', 'customer-1')->update($data); // update data user

        // coba akses model UserModel
        //$user = UserModel::all(); // ambil semua data dari tabel m_user
        //return view('user', ['data' => $user]);
    }

    public function tambah()
    {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);

        return redirect('/user');
    }

    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['user' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make('$request->password');
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }
}