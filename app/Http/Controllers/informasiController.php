<?php

namespace App\Http\Controllers;

use App\Models\Informasi;
use App\Models\gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiController extends Controller
{
    public function input()
    {
        return view('informasi.input');
    }

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'judul' => 'required',
        'isi' => 'required',
        'tanggal' => 'required',
        'foto' => 'image|mimes:jpeg,png,jpg,gif|max:50000',

    ], [
        'judul.required' => 'Kolom judul harus diisi.',
        'isi.required' => 'Kolom isi harus diisi.',
        'tanggal.required' => 'Kolom tanggal harus diisi.',
        'foto.max' => 'Ukuran file foto terlalu besar. Maksimum ukuran yang diizinkan adalah 50 MB.',
        'foto.mimes' => 'Format file foto tidak sesuai. Format yang diizinkan: jpeg, png, jpg, gif.',
    ]);
    // Proses penyimpanan gambar jika ada
    if ($request->hasFile('foto')) {
        $imageName = time().'.'.$request->foto->extension();

        // Simpan gambar ke penyimpanan lokal di dalam folder public/images
        $path = $request->foto->storeAs('public/images', $imageName);

        // Ubah path untuk menyesuaikan dengan folder public/images
        $newPath = str_replace('public/', '', $path);
    } else {
        $newPath = null;
    }

    // Buat objek informasi dan isi dengan data yang valid
    $informasi = new Informasi();
    $informasi->judul = $request->judul;
    $informasi->isi = $request->isi;
    $informasi->tanggal = $request->tanggal;
    $informasi->id = $request->id;
    $informasi->foto = $newPath;


    // Simpan informasi
    if ($informasi->save()) {
        return redirect('informasi/input')->with('status', 'Data berhasil disimpan');
    } else {
        return redirect('informasi/input')->with('status', 'Data gagal disimpan');
    }
}


    public function informasi(){
        $informasiData = Informasi::all();
        
        return view('informasi.index')->with('data', $informasiData);
    }

    public function beranda() {
        // Mengambil data dari tabel 'gallery'
        $galleryData = DB::table('gallery')->get();
        
        // Mengambil data dari tabel 'informasi'
        $informasiData = DB::table('informasi')->get();
    
        // Mengirimkan data ke tampilan
        return view('Home.index')->with('galleryData', $galleryData)->with('informasiData', $informasiData);
    }
    
    public function edit($id) {
        $informasi = Informasi::find($id);
        if(!$informasi) {
            return redirect()->back()->with('error', 'Informasi tidak ditemukan.');
        }
        return view('informasi.edit', compact('informasi'));
    }
    
    public function update(Request $request, $id) {
        // Validasi masukan dari pengguna
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required',
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:50000' // Contoh validasi untuk foto
        ]);
    
        // Temukan informasi yang akan diperbarui
        $informasi = Informasi::findOrFail($id);
    
        // Update data informasi
        $informasi->judul = $request->judul;
        $informasi->isi = $request->isi;
        $informasi->tanggal = $request->tanggal;
        
        // Periksa apakah ada file foto yang dikirimkan
        if ($request->hasFile('foto')) {
            // Simpan foto yang baru di dalam penyimpanan yang diinginkan (misalnya: storage/app/public/images)
            $foto = $request->file('foto');
            $fotoPath = $foto->store('public/images');
            
            // Simpan nama file foto yang baru ke dalam database
            $informasi->foto = str_replace('public/', '', $fotoPath);
        }
    
        // Simpan perubahan ke dalam database
        $informasi->save();
    
        // Redirect pengguna kembali ke halaman yang diinginkan
        return redirect()->route('informasi.index')->with('success', 'Informasi berhasil diperbarui.');
    }

    public function hapus($id)
    {
        // Temukan informasi berdasarkan ID
        $informasi = Informasi::find($id);
        
        // Periksa apakah informasi ditemukan
        if (!$informasi) {
            return redirect()->back()->with('error', 'Informasi tidak ditemukan.');
        }
        
        // Hapus informasi dari database
        $informasi->delete();
        
        // Redirect kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Informasi berhasil dihapus.');
    }
    
}
