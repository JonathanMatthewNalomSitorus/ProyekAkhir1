<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            margin-top: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: calc(100% - 20px);
            padding: 10px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
        }

        input[type="file"] {
            margin-top: 10px;
        }

        button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        button:hover {
            background-color: #0056b3;
        }

        .alert {
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
        }

        .alert-danger {
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .alert-success {
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .navbar-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #2d3e50;
            padding: 10px 10px;
        }

        .navbar-container .logo img {
            width: 40%;
            height: 40%;
            border-radius: 20%;
        }

        .navbar-container .nav-list ul {
            margin: 0;
            padding: 0;
            list-style-type: none;
        }

        .navbar-container .nav-list li {
            display: inline-block;
            margin-right: 20px;
        }

        .navbar-container .nav-list li:last-child {
            margin-right: 0;
        }

        .navbar-container .nav-list li a {
            text-decoration: none;
            color: #fff;
            font-weight: bold;
        }

        .navbar-container .nav-list li a:hover {
            color: #ddd;
        }
    </style>
</head>
<body>
    <header class="navbar-container">
        <div class="logo">
            <img src="{{asset('storage/images/sekolah/th.jpeg')}}" alt="">
        </div>

        <nav class="nav-list">
            <ul>
                <li><a href="/Home">Beranda</a></li>
                <li><a href="/sekolah">Tentang</a></li>
                <li><a href="#">Informasi</a></li>
                <li><a href="#">galeri</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form action="/sekolah/store" method="post" enctype="multipart/form-data">
            @csrf
            <label for="id">ID</label><br>
            <input type="text" name="id"><br>
            <label for="judul">Judul</label><br>
            @error('judul')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="text" name="judul"><br>
            <label for="isi">Isi</label><br>
            @error('isi')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <textarea name="isi" id="" cols="30" rows="10"></textarea><br>
            <label for="tanggal">Tanggal</label><br>
            @error('tanggal')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <input type="date" name="tanggal"><br>
            <label for="foto">Foto</label><br>
            <input type="file" name="foto"><br><br>
            <button>Simpan</button> 
        </form> 
    </div>
</body>
</html>
