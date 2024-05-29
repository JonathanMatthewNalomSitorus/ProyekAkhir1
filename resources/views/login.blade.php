<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <style>
        #all{
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 20px;
            margin-top: 15vh;
        }

        #login img{
            width: 100%;
            height: 100%;
        }

        #kanan{
            background-color: #f3f3f3;
            border-radius: 20px;
        }

        #button{
            background-color: #435585;
            border-color: #435585;
        }
    </style>
    <title>Login</title>
</head>
<body>
    <div class="container py-5" id="all">
        <div class="w-50 center px-3 py-3 mx-auto" id="login">
            <img src="{{asset('storage/images/register/login.jpg')}}" alt="">
        </div>

        <div class="w-50 center px-3 py-3 mx-auto" id="kanan">
        <h1>Login</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="" method="POST">
            @csrf
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" value="{{ old('username') }}" name="username" class="form-control">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3 d-grid">
                <button name="submit" type="submit" class="btn btn-primary" id="button">Login</button>
            </div>
                <a href="{{ route('register') }}" class="">Don't have an account?</a>
            
        </form>
        </div> 
    </div>
</body>
</html>