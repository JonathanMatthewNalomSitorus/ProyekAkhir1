<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <form action="{{ route('informasi.update', $informasi->id_informasi) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="judul">judul</label>
        <input type="text" name="judul" value="{{ $informasi->judul }}"><br>
        <label for="isi">isi</label>
        <textarea name="isi">{{ $informasi->isi }}</textarea><br>
        <label for="isi">tanggal</label>
        <input type="date" name="tanggal" value="{{ $informasi->tanggal }}"><br>
        <!-- Display previous photo -->
        <label for="foto">foto</label>
        @if($informasi->foto)
            <img src="{{ asset('storage/'. $informasi->foto) }}" alt="Previous Photo" style="max-width: 200px;">
        @endif
        
        <!-- Input for new photo -->
        <input type="file" name="foto"><br> <!-- Input for photo -->
        
        <!-- Add fields for other attributes -->
        <button type="submit">Simpan</button>
    </form>
    <a href="/informasi"><button>kembali</button></a>
</body>
</html>
