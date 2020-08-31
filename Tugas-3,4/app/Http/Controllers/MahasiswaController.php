<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{


    public function index()
    {
        return response()->json([
            'status' => 'sukses',
            'message' => 'Berhasil melihat semua data',
            'data' => Mahasiswa::all()
        ]);;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'min:3', 'max:50'],
            'username' => ['alpha_num', 'required', 'min:3', 'max:25', 'unique:users,username'],
            'email' => ['email', 'required', 'unique:users,email'],
            'password' => ['required', 'min:6'],
            'nim' => ['required', 'numeric'],
            'fakultas' => ['required', 'min:6'],
            'jurusan' => ['required', 'min:6'],
            'no_hp' => ['required', 'min:6'],
            'no_wa' => ['required', 'min:6']
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->role = 2;
        $user->password = bcrypt($request->password);
        $user->save();
        $mahasiswa = new Mahasiswa;
        $mahasiswa->user_id = $user->id;
        $mahasiswa->nim = $request->nim;
        $mahasiswa->fakultas = $request->fakultas;
        $mahasiswa->jurusan = $request->jurusan;
        $mahasiswa->no_hp = $request->no_hp;
        $mahasiswa->no_wa = $request->no_wa;
        $mahasiswa->save();

        return response()->json([
            'status' => 'sukses',
            'message' => 'Penambahan Data Mahasiswa Berhasil',
            'data' => [
                'user' => $user,
                'mahasiswa' => $mahasiswa
            ]
        ]);
    }

    public function show($id)
    {
        if (Mahasiswa::find($id) != null)
            return response()->json([
                'status' => 'sukses',
                'message' => "Berhasil melihat data mahasiswa dengan ID : $id",
                'data' => Mahasiswa::find($id)
            ]);
        return response()->json([
            'status' => 'sukses',
            'message' => 'Data tidak di temukan'
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Mahasiswa::find($id)) {
            $user = User::find(Mahasiswa::find($id)->user_id);
            $user->name = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;
            $user->role = 2;
            $user->password = bcrypt($request->password);
            $user->update();
            $mahasiswa = Mahasiswa::find($id);
            $mahasiswa->user_id = $user->id;
            $mahasiswa->nim = $request->nim;
            $mahasiswa->fakultas = $request->fakultas;
            $mahasiswa->jurusan = $request->jurusan;
            $mahasiswa->no_hp = $request->no_hp;
            $mahasiswa->no_wa = $request->no_wa;
            $mahasiswa->update();
            return response()->json([
                'status' => 'sukses',
                'message' => 'Update Data Mahasiswa Berhasil',
                'data' => [
                    'user' => $user,
                    'mahasiswa' => $mahasiswa
                ]
            ]);
        }
        return response()->json([
            'status' => 'sukses',
            'message' => 'Data tidak di temukan'
        ]);
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $user_id = $mahasiswa->user_id;
        $mahasiswa->delete();
        User::destroy($user_id);
        return response()->json([
            'status' => 'sukses',
            'message' => 'Data Mahasiswa Berhasil di hapus',
        ]);
    }
}
