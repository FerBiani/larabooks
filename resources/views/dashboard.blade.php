@extends('layouts.app')
@section('title', 'Dashboard')

@section('breadcrumb')
    <li class="breadcrumb-item active">Dashboard</li>
@endsection

@section('content')
    
    <div class="col-12">
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            Livros Cadastrados
                            <span class="h1">{{ $counts['books'] }}</span>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('books.index') }}">
                            Ver todos os livros
                        </a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            Usuários Cadastrados
                            <span class="h1">{{ $counts['users'] }}</span>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('users.index') }}">
                            Ver todos os usuários
                        </a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            Clientes Cadastrados
                            <span class="h1">{{ $counts['customers'] }}</span>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('customers.index') }}">
                            Ver todos os clientes
                        </a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            Empréstimos realizados
                            <span class="h1">{{ $counts['lendings'] }}</span>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('lendings.index') }}">
                            Ver todos os empréstimos
                        </a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="col-12 col-sm-6">

        <div class="card">
            <div class="card-header bg-dark text-white">
                Relatório de Clientes
            </div>
            <div class="card-body">
                <form action="{{ route('reports.customers') }}" method="GET">
                    <div class="row align-items-end">
                        <div class="col-12 col-sm-4">
                            <label>Data inicial</label>
                            <input type="text" name="date_start" class="form-control"></input>
                        </div>
                        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                            <label>Data final</label>
                            <input type="text" name="date_end" class="form-control"></input>
                        </div>
                        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                            <button type="submit" class="btn btn-success">Gerar relatório</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>

    <div class="col-12 col-sm-6 mt-4 mt-sm-0">

        <div class="card">
            <div class="card-header bg-dark text-white">
                Relatório de Empréstimos
            </div>
            <div class="card-body">
                <form action="{{ route('reports.lendings') }}" method="GET">
                    <div class="row align-items-end">
                        <div class="col-12 col-sm-4">
                            <label>Data inicial</label>
                            <input type="text" name="date_start" class="form-control"></input>
                        </div>
                        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                            <label>Data final</label>
                            <input type="text" name="date_end" class="form-control"></input>
                        </div>
                        <div class="col-12 col-sm-4 mt-3 mt-sm-0">
                            <button type="submit" class="btn btn-success">Gerar relatório</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
@endsection