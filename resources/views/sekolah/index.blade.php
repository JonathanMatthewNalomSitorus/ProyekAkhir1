<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sekolah</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .post {
            margin-bottom: 20px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        
        nav a{
            margin-right: 20px;
        }

        button:hover {
            background-color: #0056b3;
        }

        a {
            text-decoration: none;
            color: #007bff;
        }

        a:hover {
            text-decoration: underline;
        }

        .navbar-container {
            background-color: #2d3e50;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-container a {
         color: #fff;
        }

        .navbar-container .logo img {
            width: 100px;
            height: auto;
            border-radius: 50%; 
        }
        
    </style>

</head>

<body>
    <header class="navbar-container">
        <div class="logo">
            <img src="{{asset('storage/images/sekolah/th.jpeg')}}" alt="">
        </div>
        <nav>
            <a href="/home">Beranda</a>
            <a href="/sekolah">Tentang</a>
            <a href="/informasi">Informasi</a>
            <a href="/gallery">Galeri</a>
        </nav>
    </header>
    <div class="container">
        @foreach ($data as $item)
        <div class="post">
            <h1>{{ $item->judul }}</h1>
            <p>{{ $item->isi }}</p>
            <p>Tanggal: {{ $item->tanggal }}</p>
            @if ($item->foto)
            <img src="{{ asset('storage/'. $item->foto) }}" alt="{{ $item->judul }}">
            @endif

            <!-- Tombol Hapus -->
            <form action="{{ route('sekolah.hapus', $item->id_datasekolah) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>

            <a href="{{ route('sekolah.edit', $item->id_datasekolah) }}">Edit</a>
            <hr>
        </div>
        @endforeach

        <a href="/sekolah/input"><button>Tambah Data Sekolah</button></a>
    </div>
</body>

</html>
