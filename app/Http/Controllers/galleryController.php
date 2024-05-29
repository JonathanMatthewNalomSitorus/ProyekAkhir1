<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Http\Request;

class galleryController extends Controller
{
    public function input()
    {
        return view('gallery.input');
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:50000',

        ]);

        // Proses penyimpanan gambar jika ada
        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();

            // Simpan gambar ke penyimpanan lokal di dalam folder public/images
            $path = $request->foto->storeAs('public/images/gallery', $imageName);

            // Ubah path untuk menyesuaikan dengan folder public/images
            $newPath = str_replace('public/', '', $path);
        } else {
            $newPath = null;
        }

        // Buat objek informasi dan isi dengan data yang valid
        $gallery = new gallery();
        $gallery->judul = $request->judul;
        $gallery->deskripsi = $request->deskripsi;
        $gallery->id = $request->id;
        $gallery->foto = $newPath;
       


        // Simpan informasi
        if ($gallery->save()) {
            return redirect('gallery/input')->with('status', 'Data berhasil disimpan');
        } else {
            return redirect('gallery/input')->with('status', 'Data gagal disimpan');
        }
    }

    public function gallery(){
        $data = gallery::all();
        
        return view('gallery.index')->with('data', $data);
    }

    public function edit($id)
    {
        $gallery = gallery::find($id);
        if(!$gallery) {
            return redirect()->back()->with('error', 'data tidak ditemukan.');
        }
        return view('gallery.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = gallery::findOrFail($id);

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:50000',
        ]);

        $gallery->judul = $request->judul;
        $gallery->deskripsi = $request->deskripsi;

        // Simpan foto jika diunggah
        if ($request->hasFile('foto')) {
            $imageName = time() . '.' . $request->foto->extension();
            // Simpan foto ke dalam folder public/images/sekolah
            $request->foto->storeAs('public/images/gallery', $imageName);
            $gallery->foto = $imageName;
        }

        if ($gallery->save()) {
            return redirect()->route('gallery.edit', $gallery->id)->with('status', 'Data berhasil diperbarui');
        } else {
            return redirect()->route('gallery.edit', $gallery->id)->with('status', 'Data gagal diperbarui');
        }
    }

    public function hapus($id)
    {
        // Temukan data sekolah berdasarkan ID
        $gallery = gallery::find($id);
        
        // Periksa apakah data sekolah ditemukan
        if (!$gallery) {
            return redirect()->back()->with('error', 'gallery tidak ditemukan.');
        }
        
        // Hapus data sekolah dari database
        $gallery->delete();
        
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'gallery berhasil dihapus.');
    }
}
