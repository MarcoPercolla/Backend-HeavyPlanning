<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app">

        <div class="container-fluid vh-100">
            <div class="row h-100">
                <header id="navbar">
                    <img src="{{ asset('img/logoimg/HeavyPlanningLogo.jpg') }}" alt="img">
                    <a href="/"><i class="fa-solid fa-home-alt fa-lg fa-fw"></i> Home</a>
                    <a href="{{ route('admin.operators.index') }}"><i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i>Dashboard</a>
                    @if(auth()->user()->operator)
                        <a href="{{ route('admin.operators.show', auth()->user()->operator->id) }}">
                            <i class="fa-solid fa-user fa-lg fa-fw"></i> mio Profilo 
                        </a>
                    @else
                        @if(!session('operatorAdded'))
                            <a href="{{ route('admin.operators.create') }}">
                                <i class="fa-solid fa-plus fa-lg fa-fw"></i> Crea il tuo profilo
                            </a>
                        @endif
                    @endif


                    
                    
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                    </form>
                    
                </header>
                
                
                <main>
                    @yield('content')
                </main>
            </div>
        </div>

    </div>
</body>

</html>


{{-- <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column">
                
                            <li class="nav-item">
                                <a class="nav-link text-white" href="/">
                                    <li class="nav-item">
                                <a class="nav-link text-white" href="/">
                                    <i class="fa-solid fa-home-alt fa-lg fa-fw"></i> Home
                                </a>
                            </li> Home
                                </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link text-white {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <i class="fa-solid fa-tachometer-alt fa-lg fa-fw"></i> Dashboard
                                </a>
                            </li>



                            <!-- <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('admin.operators.create') }}">
                                    <i class="fa-solid fa-plus fa-lg fa-fw"></i> Aggiungi operatore
                                </a>
                            </li> -->

                            @if($there_is_operator == false)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('admin.operators.create') }}">
                                        <i class="fa-solid fa-plus fa-lg fa-fw"></i> Aggiungi operatore
                                    </a>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('admin.operators.edit', $operator_id[0]->id) }}">
                                        <i class="fa-solid fa-plus fa-lg fa-fw"></i> Modifica operatore
                                    </a>
                                </li>
                            @endif

                            @if($there_is_operator == true)
                                <li class="nav-item">
                                    <a class="nav-link text-white" href="{{ route('admin.operator-sponsorships.create') }}">
                                        <i class="fa-solid fa-plus fa-lg fa-fw"></i> Aggiungi sponsorizzazione
                                    </a>
                                </li>
                            @endif

                            <li class="nav-item">
                                <a class="nav-link text-white" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-sign-out-alt fa-lg fa-fw"></i> {{ __('Logout') }}
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                
                        </ul>
                
                    </div> --}}

