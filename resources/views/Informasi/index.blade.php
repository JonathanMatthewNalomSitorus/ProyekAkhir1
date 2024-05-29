<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi</title>
</head>

<body>
    @foreach ($data as $item)
    <div>
        <h2>{{ $item->judul }}</h2>
        <p>{{ $item->isi }}</p> 
        <img src="{{ asset('storage/'. $item->foto) }}" alt="{{ $item->judul }}">
        
        <!-- Tombol Edit -->
        <a href="/edit/{{ $item->id_informasi }}">Edit</a>
        
        <!-- Tombol Hapus -->
        <form action="/hapus/{{ $item->id_informasi }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit">Hapus</button>
        </form>
    </div>
    @endforeach
    <br><br>
    <a href="/beranda"><button>Kembali</button></a>
    <a href="/informasi/input"><button>Tambah</button></a>
</body>

</html>
