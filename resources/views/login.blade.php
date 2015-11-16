<!DOCTYPE html>
<html>
<head>
    <title>Resource</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 96px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">LOGIN</div>

        <!--Mostra missatge error si els camps no són correctes-->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        
        <!--Mostra missatge error si el login no és correcte-->
        @if (Session::has('login_error'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ Session::get('login_error') }}</li>
                </ul>
            </div>
        @endif

        <form method="post" action="{{ route('auth.postLogin') }}">
            <!--{ !! csrf_field() !! }-->
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <lavel for="email">EmailAdr: </lavel>
                <input type="email" class="form-control" id="email" name="email"
                       placeholder="myemail@mydomain.com"
                       value="{{ old('email') }}"
                       required>
            </div>

            <div class="form-group">
                <lavel for="password">Password: </lavel>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="checkbox">
                <lave>
                    <input name="remember" type="checkbox">Remember me
                </lave>
            </div>

            <button id="login" type="submit" class="btn btn-default">Login</button>
            <button type="reset" class="btn btn-default">Reset</button>

        </form>

        <a id="register" rel="stylesheet" href="{{ route('register.register') }}">Registra-te</a>
    </div>
</div>
</body>
</html>