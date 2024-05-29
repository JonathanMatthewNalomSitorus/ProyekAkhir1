<?php

namespace App\Http\Controllers;

use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SekolahController extends Controller
{
    public function data()
    {
        $data = Sekolah::all();
        return view('sekolah.index', ['data' => $data]);
    }

    public function input()
    {
        return view('sekolah.input');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:50000',

        ]);

        // Proses penyimpanan gambar jika ada
        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();

            // Simpan gambar ke penyimpanan lokal di dalam folder public/images
            $path = $request->foto->storeAs('public/images', $imageName);

            // Ubah path untuk menyesuaikan dengan folder public/images
            $newPath = str_replace('public/', '', $path);
        } else {
            $newPath = null;
        }

        // Buat objek informasi dan isi dengan data yang valid
        $sekolah = new Sekolah();
        $sekolah->judul = $request->judul;
        $sekolah->isi = $request->isi;
        $sekolah->tanggal = $request->tanggal;
        $sekolah->id = $request->id;
        $sekolah->foto = $newPath;


        // Simpan informasi
        if ($sekolah->save()) {
            return redirect('sekolah/input')->with('status', 'Data berhasil disimpan');
        } else {
            return redirect('sekolah/input')->with('status', 'Data gagal disimpan');
        }
    }

    public function edit($id)
    {
        $sekolah = sekolah::find($id);
        if(!$sekolah) {
            return redirect()->back()->with('error', 'data tidak ditemukan.');
        }
        return view('sekolah.edit', compact('sekolah'));
    }

    public function update(Request $request, $id)
    {
        $sekolah = Sekolah::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:50000',
        ]);

        $sekolah->judul = $request->judul;
        $sekolah->isi = $request->isi;
        $sekolah->tanggal = $request->tanggal;

        // Simpan foto jika diunggah
        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            // Simpan foto ke dalam folder public/images/sekolah
            $request->foto->storeAs('public/images/sekolah', $imageName);
            $sekolah->foto = $imageName;
        }

        if ($sekolah->save()) {
            return redirect()->route('sekolah.edit', $sekolah->id)->with('status', 'Data berhasil diperbarui');
        } else {
            return redirect()->route('sekolah.edit', $sekolah->id)->with('status', 'Data gagal diperbarui');
        }
    }

    public function hapus($id)
    {
        // Temukan data sekolah berdasarkan ID
        $dataSekolah = Sekolah::find($id);
        
        // Periksa apakah data sekolah ditemukan
        if (!$dataSekolah) {
            return redirect()->back()->with('error', 'Data sekolah tidak ditemukan.');
        }
        
        // Hapus data sekolah dari database
        $dataSekolah->delete();
        
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Data sekolah berhasil dihapus.');
    }
}
