@extends('layouts.app')
@section('title', 'Clientes')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
</li>
<li class="breadcrumb-item active">Clientes</li>
@endsection

@section('content')
<div class="col-12">
    <div class="card">
        <div class="card-header bg-primary text-white">
            Clientes
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-12 text-right">
                    <a href="{{ route('customers.create') }}" class="btn btn-success">Novo Cliente</a>
                </div>
                <div class="col-12 mt-4">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nome</th>
                                <th>E-mail</th>
                                <th>Data de nascimento</th>
                                <th>Data de cadastro</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                                <tr>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>{{ $customer->date_of_birth }}</td>
                                    <td>{{ $customer->created_at->format('d/m/Y') }}</td>
                                    <td>
                                        <a class="btn btn-warning" 
                                        href="{{ route('customers.edit', $customer->id) }}">
                                            Editar
                                        </a>
                                    </td>
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