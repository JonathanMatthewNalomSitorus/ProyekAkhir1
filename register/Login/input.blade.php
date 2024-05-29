<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <h1>Login</h1>
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif

    
<form action="/Login/store" method="post">
 
    @csrf
    <label for="id_user">id</label><br>
    @error('id_user')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="number" name="username_user"><br>

    <label for="username_user">username</label><br>
    @error('username_user')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" name="username_user"><br>


    <label for="password_user">password</label><br>
    @error('password_user')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="password" name="password_user" id=""><br> 


    <label for="created__by">dibuat oleh</label><br>
    @error('id_user')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" name="created_by"><br>


    <label for="updated_by">diperbarui oleh</label><br>
    @error('id_user')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="text" name="updated_by"><br>


    <label for="last_login">terakhir login</label><br>
    @error('id_user')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input type="date" name="last_login"><br>
    
    <button type="submit">simpan</button> 
</form>
</body>
</html>
