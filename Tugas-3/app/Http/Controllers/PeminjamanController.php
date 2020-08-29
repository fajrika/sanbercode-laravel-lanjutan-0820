<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{

    public function index()
    {
        return response()->json([
            'status' => 'sukses',
            'message' => 'Berhasil melihat semua data',
            'data' => Peminjaman::all()
        ]);;
    }

    public function store(Request $request)
    {
        $request->validate([
            'buku_id' => ['required', 'numeric']
        ]);
        $peminjaman = new Peminjaman();
        $peminjaman->mahasiswa_id = auth()->user()['id'];
        $peminjaman->buku_id = $request->buku_id;
        $peminjaman->tanggal_peminjaman = date("Y/m/d");
        $peminjaman->tanggal_batas_akhir_peminjaman = date('Y/m/d', strtotime(date('Y/m/d') . "+7 days"));;
        $peminjaman->save();

        return response()->json([
            'status' => 'sukses',
            'message' => 'Penambahan Data Peminjaman Berhasil',
            'data' => [
                'peminjaman' => $peminjaman,
            ]
        ]);
    }

    public function show($id)
    {
        if (Peminjaman::find($id) != null)
            return response()->json([
                'status' => 'sukses',
                'message' => "Berhasil melihat data Peminjaman dengan ID : $id",
                'data' => Peminjaman::find($id)
            ]);
        return response()->json([
            'status' => 'sukses',
            'message' => 'Data tidak di temukan'
        ]);
    }

    public function update(Request $request,  $id)
    {
        if (Peminjaman::find($id)) {

            $peminjaman = Peminjaman::find($id);
            $peminjaman->tanggal_pengembalian = $request->tanggal_pengembalian;
            $peminjaman->status_ontime = $request->tanggal_pengembalian <= $request->tanggal_batas_akhir_peminjaman ? 1 : 0;
            $peminjaman->update();
            return response()->json([
                'status' => 'sukses',
                'message' => 'Update Data Peminjaman Berhasil',
                'data' => [
                    'Peminjaman' => $peminjaman
                ]
            ]);
        }
        return response()->json([
            'status' => 'sukses',
            'message' => 'Data tidak di temukan'
        ]);
    }

    public function destroy(Peminjaman $peminjaman)
    {
        $peminjaman->delete();
        return response()->json([
            'status' => 'sukses',
            'message' => 'Data Buku Berhasil di hapus',
        ]);
    }
}
