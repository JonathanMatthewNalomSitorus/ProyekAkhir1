<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit gallery</title>
</head>
<body>
    <h1>Edit gallery</h1>
    
    <form action="{{ route('gallery.update', $gallery->id_gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="judul">Judul:</label><br>
        <input type="text" id="judul" name="judul" value="{{ $gallery->judul }}"><br><br>

        <label for="deskripsi">deskripsi:</label><br>
        <textarea id="deskripsi" name="deskripsi" rows="4" cols="50">{{ $gallery->deskripsi }}</textarea><br><br>

        <label for="foto">Foto:</label><br>
        @if ($gallery->foto)
        <img src="{{ asset('storage/'. $gallery->foto) }}" alt="Previous Photo" style="max-width: 200px;">
        @endif
        <input type="file" id="foto" name="foto"><br><br>

        <button type="submit">Simpan</button>
    </form>
    <a href="/gallery"><button>kembali</button></a>
</body>
</html>
