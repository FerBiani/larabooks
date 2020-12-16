<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LaraBooks - @yield('title')</title>
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">LaraBooks</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user fa-fw"></i>
                        {{ auth()->user()->name }}
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{ route('login.logout') }}">
                            <i class="fas fa-power-off"></i>
                            Sair
                        </a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                           
                            <a class="nav-link" href="{{ route('dashboard.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>

                            <a class="nav-link" href="{{ route('books.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Livros
                            </a>

                            <a class="nav-link" href="{{ route('customers.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                                Clientes
                            </a>
                            
                            <a class="nav-link" href="{{ route('lendings.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-bookmark"></i></div>
                                Empréstimos
                            </a>

                            <a class="nav-link" href="{{ route('users.index') }}">
                                <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                                Usuários
                            </a>
                            
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="d-flex align-items-center">
                            <img width="20px" src="{{ asset('img/if.png') }}">
                            <div class="ml-3">
                                <h6 class="mb-0">Instituto Federal</h6>
                                <div class="small">Câmpus Caraguatatuba</div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">@yield('title')</h1>
                        <ol class="breadcrumb mb-4">
                           @yield('breadcrumb')
                        </ol>
                        <div class="row">

                            <div class="col-12">
                                @if($errors->any())
                                    <div class="row mt-3 mb-3">
                                        <div class="col-12">
                                            <div class="alert alert-danger" role="alert">
                                                @foreach ($errors->all() as $error)
                                                    <div>{{ $error }}</div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(session()->has('msg_success'))
                                    <div class="row mt-3 mb-3">
                                        <div class="col-12">
                                            <div class="alert alert-success" role="alert">
                                                {{ session()->get('msg_success') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(session()->has('msg_error'))
                                    <div class="row mt-3 mb-3">
                                        <div class="col-12">
                                            <div class="alert alert-danger" role="alert">
                                                {{ session()->get('msg_error') }}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>

                            @yield('content')
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Todos os direitos reservados &copy; LaraBooks 2020</div>
                            <div>
                                Desenvolvido por:
                                <a target="_blank" href="https://github.com/FerBiani">Fernando Biani</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
      
        <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
        <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>

        @yield('js')
    </body>
</html>
