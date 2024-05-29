<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        header {
            background-color: #2d3e50;
        }

        footer {
            background-color: #2d3e50;
        }
    </style>
</head>

<body class="bg-gray-100">
    <header class="navbar-container p-4 flex justify-between items-center" id="header">
        <div class="logo">
            <img src="{{ asset('storage/images/sekolah/th.jpeg') }}" alt="" class="h-10">
        </div>

        <nav class="nav-list">
            <ul class="flex space-x-4 text-white">
                <li><a href="/beranda" class="hover:underline">Beranda</a></li>
                <li><a href="/sekolah" class="hover:underline">Tentang</a></li>
                <li><a href="/informasi" class="hover:underline">Informasi</a></li>
                <li><a href="#" class="hover:underline">Galeri</a></li>
            </ul>
        </nav>

        <div class="logout">
            <a href="/logout" class="text-white hover:underline">Logout</a>
        </div>
    </header>

    @if (session('status'))
    <div class="alert alert-success bg-green-500 text-white p-2 m-4 rounded">
        {{ session('status') }}
    </div>
    @endif

    <form action="/informasi/store" method="post" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md max-w-lg mx-auto my-8">
        @csrf
        <div class="mb-4">
            <label for="id" class="block text-gray-700">ID</label>
            <input type="text" name="id" class="border border-gray-300 p-2 w-full rounded">
        </div>

        <div class="mb-4">
            <label for="judul" class="block text-gray-700">Judul</label>
            @error('judul')
            <div class="alert alert-danger text-red-500">{{ $message }}</div>
            @enderror
            <input type="text" name="judul" class="border border-gray-300 p-2 w-full rounded">
        </div>

        <div class="mb-4">
            <label for="isi" class="block text-gray-700">Isi</label>
            @error('isi')
            <div class="alert alert-danger text-red-500">{{ $message }}</div>
            @enderror
            <textarea name="isi" cols="30" rows="10" class="border border-gray-300 p-2 w-full rounded"></textarea>
        </div>

        <div class="mb-4">
            <label for="tanggal" class="block text-gray-700">Tanggal Dibuat</label>
            @error('tanggal')
            <div class="alert alert-danger text-red-500">{{ $message }}</div>
            @enderror
            <input type="date" name="tanggal" class="border border-gray-300 p-2 w-full rounded">
        </div>

        <div class="mb-4">
            <label for="foto" class="block text-gray-700">Foto</label>
            @error('foto')
            <div class="alert alert-danger text-red-500">{{ $message }}</div>
            @enderror
            <input type="file" name="foto" class="border border-gray-300 p-2 w-full rounded">
        </div>

        <div class="flex justify-between">
            <button type="submit" class="text-white px-4 py-2 rounded" style="background: #2d3e50;">Simpan</button>
            <a href="/informasi" class="text-white px-4 py-2 rounded" style="background: #2d3e50;">Kembali</a>
        </div>
    </form>

    <footer class="text-center p-4 text-white">
        @smpn4Laguboti
    </footer>
</body>

</html>
