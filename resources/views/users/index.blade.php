@extends('layouts.app')
@section('title', 'Usuários')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
</li>
<li class="breadcrumb-item active">Usuários</li>
@endsection

@section('content')
    <div class="col-12 text-right">
        <a href="{{ route('users.create') }}" class="btn btn-success">Novo Usuário</a>
    </div>
    <div class="col-12 mt-4">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Nível</th>
                    <th>Data de cadastro</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at->format('d/m/Y H:i:s') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection