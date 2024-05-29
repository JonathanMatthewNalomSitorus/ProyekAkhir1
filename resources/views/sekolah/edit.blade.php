<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Sekolah</title>
</head>
<body>
    <h1>Edit Sekolah</h1>
    
    <form action="{{ route('sekolah.update', $sekolah->id_datasekolah) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="judul">Judul:</label><br>
        <input type="text" id="judul" name="judul" value="{{ $sekolah->judul }}"><br><br>

        <label for="isi">Isi:</label><br>
        <textarea id="isi" name="isi" rows="4" cols="50">{{ $sekolah->isi }}</textarea><br><br>

        <label for="tanggal">Tanggal:</label><br>
        <input type="date" id="tanggal" name="tanggal" value="{{ $sekolah->tanggal }}"><br><br>

        <label for="foto">Foto:</label><br>
        @if ($sekolah->foto)
        <img src="{{ asset('storage/'. $sekolah->foto) }}" alt="Previous Photo" style="max-width: 200px;">
        @endif
        <input type="file" id="foto" name="foto"><br><br>

        <button type="submit">Simpan</button>
    </form>
    <a href="/sekolah"><button>kembali</button></a>
</body>
</html>
