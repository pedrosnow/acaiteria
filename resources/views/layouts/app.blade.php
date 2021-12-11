<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

      <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- incones -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.css') }}">

    <!-- BootStrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
        


    <!-- Animate css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

 
    <!-- Scripts -->

    <script src="{{asset('fontawesome/css/all.css') }}" defer></script>
    <script src="{{asset('node_modules/chart.js/dist/chart.js')}}"></script>
   
   
    <!-- Jquery -->

    <script src="https://code.jquery.com/jquery-3.6.0.js"
            integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
            


    <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Bootstrap -->

    
</head>
<body>
<div id="alerta-corpo"></div>    
<section id="modal" style="display:none" >

    
</section>   
    
    @if (Auth::check())
    <header>
        <div id="perfil">
            <span id="foto">
                <img src="https://scontent.fthe1-1.fna.fbcdn.net/v/t1.6435-9/122156642_3371201486327182_7731893899772429075_n.jpg?_nc_cat=111&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeFyq0iy-wrJNHTx_8LsNqokzL4ey8eVWv_Mvh7Lx5Va_8YbwQCpnZLAWwjJEzkmHpO4aJs09uFQfrrIl73PNVR3&_nc_ohc=R4VsO2dT_tYAX-aPRDh&tn=DMrfdFSCSExBBKvx&_nc_ht=scontent.fthe1-1.fna&oh=ca1d707a54984ab93726176c502ffdfa&oe=61A6B7EA"
                    width="100%">
            </span>
            <span id="corpo-nome">
                <div>Olá</div>
                <div id="nome">{{ Auth::user()->name }}</div>
            </span>
            <ion-icon id="incone-alerta" name="notifications-outline"></ion-icon>
        </div>
        <nav>
            <ul>
                <a href="{{url('home')}}">
                    <span>
                        <ion-icon id="incone-lateral" name="stats-chart-outline"></ion-icon>
                    </span>
                    <span>Painel</span>
                </a>
                <a href="{{url('produtos')}}">
                    <span>
                        <ion-icon id="incone-lateral" name="cart-outline"></ion-icon>
                    </span>
                    <span>Produtos</span>
                </a>
                <a href="{{url('pedidos')}}">
                    <span>
                        <ion-icon id="incone-lateral" name="pizza-outline"></ion-icon>
                    </span>
                    <span>Pedidos</span>
                </a>
                <a href="http://">
                    <span>
                        <ion-icon id="incone-lateral" name="person-circle-outline"></ion-icon>
                    </span>
                    <span>Clientes</span>
                </a>
                <div id="titulo-configuracao">CONFIGURAÇÕES</div>
                <a href="http://">
                    <span>
                        <ion-icon id="incone-lateral" name="settings-outline"></ion-icon>
                    </span>
                    <span>Editar perfil</span>
                </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>    
                    <span>
                        <ion-icon id="incone-lateral" name="exit-outline"></ion-icon>
                    </span>
                    <span>Sair</span>
                </a>
            </ul>
        </nav>


    </header>
    @endif
    
    <main>
        
        
        <section  id="main" >
            @yield('content')
        </section>
        
        </main>
    </div>

    

  
</body>
</html>
