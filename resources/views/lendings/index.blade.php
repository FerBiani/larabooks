@extends('layouts.app')
@section('title', 'Empréstimos')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
</li>
<li class="breadcrumb-item active">Empréstimos</li>
@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Empréstimos
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('lendings.create') }}" class="btn btn-success">Novo Empréstimo</a>
                </div>
                <div class="col-12 mt-4">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Cliente</th>
                                <th>Livros</th>
                                <th>Usuário responsável</th>
                                <th>Data do empréstimo</th>
                                <th>Data de devolução</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lendings as $lending)
                                <tr>
                                    <td>{{ $lending->customer->name }}</td>
                                    <td>{{ implode(', ', $lending->books->pluck('name')->toArray()) }}</td>
                                    <td>{{ $lending->user->name }}</td>
                                    <td>{{ $lending->created_at->format('d/m/Y') }}</td>
                                    <td>{{ $lending->return_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection