<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
            <link href="https://fonts.googleapis.com/css?family=Satisfy&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
   <main id="main">

        <div id="container-login">

        <div class="conteudo" id="logo">

            <div id="corpo-logo">
                <img src="{{asset('img/logo.png')}}" width="100%">
            </div>

        </div>
        <div class="conteudo" id="formularioLogin">

            <form method="POST" action="{{ route('login') }}" id="formLogin">
                @csrf
                <div>
                    <h3 id="titulo">Login</h3>
                </div>
                <div class="corpo-input">
                <li class="fas fa-user-alt incone" ></li>
                    <input  type="email"
                        class=" @error('email') is-invalid @enderror" id="input" name="email"
                        placeholder="Email" required autocomplete="email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="corpo-input">
                <li class="fas fa-key incone" ></li>
                    <input  type="password"
                        name="password" placeholder="Senha" id="input" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <button id="tbn-login" type="submit" class="btn btn-primary"> {{ __('Login') }}</button>
            </form>


        </div>



        </div>

       </div>
   </main>
</body>
</html>