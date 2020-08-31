<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{

    public function index()
    {
        return response()->json([
            'status' => 'sukses',
            'message' => 'Berhasil melihat semua data',
            'data' => Buku::all()
        ]);;
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_buku' => ['required', 'min:3', 'max:50'],
            'judul' => ['required', 'min:3', 'max:25', 'unique:users,username'],
            'pengarang' => ['required'],
            'tahun_terbit' => ['required', 'numeric', 'min:0', 'max:9999']
        ]);

        $buku = new Buku;
        $buku->kode_buku = $request->kode_buku;
        $buku->judul = $request->judul;
        $buku->pengarang = $request->pengarang;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();

        return response()->json([
            'status' => 'sukses',
            'message' => 'Penambahan Data Buku Berhasil',
            'data' => [
                'buku' => $buku,
            ]
        ]);
    }

    public function show($id)
    {
        if (Buku::find($id) != null)
            return response()->json([
                'status' => 'sukses',
                'message' => "Berhasil melihat data Buku dengan ID : $id",
                'data' => Buku::find($id)
            ]);
        return response()->json([
            'status' => 'sukses',
            'message' => 'Data tidak di temukan'
        ]);
    }

    public function update(Request $request, $id)
    {
        if (Buku::find($id)) {

            $buku = Buku::find($id);
            $buku->kode_buku = $request->kode_buku;
            $buku->judul = $request->judul;
            $buku->pengarang = $request->pengarang;
            $buku->tahun_terbit = $request->tahun_terbit;
            $buku->update();
            return response()->json([
                'status' => 'sukses',
                'message' => 'Update Data Buku Berhasil',
                'data' => [
                    'Buku' => $buku
                ]
            ]);
        }
        return response()->json([
            'status' => 'sukses',
            'message' => 'Data tidak di temukan'
        ]);
    }

    public function destroy(Buku $buku)
    {
        $buku->delete();
        return response()->json([
            'status' => 'sukses',
            'message' => 'Data Buku Berhasil di hapus',
        ]);
    }
}
