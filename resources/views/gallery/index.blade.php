<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>gallery</title>
</head>

<body>
    @foreach ($data as $item)
    <div>
        <h2>{{ $item->judul}}</h2>
        <p>{{ $item->deskripsi}}</p> 
        <img src="{{ asset('storage/'. $item->foto) }}" alt="{{ $item->judul }}">
    </div>
     <!-- Tombol Hapus -->
     <form action="{{ route('gallery.hapus', $item->id_gallery) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
    
    <a href="{{ route('gallery.edit', $item->id_gallery) }}">Edit</a>
    <hr>
    @endforeach
    <br><br>
    <a href="/beranda"><button>Kembali</button></a>
    <a href="/gallery/input"><button>Tambah</button></a>
</body>

</html>
