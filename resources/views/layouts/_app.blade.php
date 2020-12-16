<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LaraBooks - @yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">LaraBooks</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="{{ route('dashboard.index') }}">Dashboard</a>
                <a class="nav-item nav-link" href="{{ route('books.index') }}">Livros</a>
                <a class="nav-item nav-link" href="{{ route('lendings.index') }}">Empréstimos</a>
                @if(auth()->user()->role == 'admin')
                    <a class="nav-item nav-link" href="{{ route('users.index') }}">Usuários</a>
                @endif
            </div>
        </div>
        <div class="d-flex align-items-center">
            <span class="nav-item nav-link">{{ auth()->user()->name }}</span>
            <div>|</div>
            <a class="nav-item nav-link" href="{{ route('login.logout') }}">Sair</a>
        </div>
    </nav>

    <div class="container my-5">

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

        @yield('content')

    </div>

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

    @yield('js')

</body>
</html>