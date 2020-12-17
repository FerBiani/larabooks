@extends('layouts.app')
@section('title', 'Novo Usuário')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
</li>
<li class="breadcrumb-item">
    <a href="{{ route('users.index') }}">Usuários</a>
</li>
<li class="breadcrumb-item active">Novo Usuário</li>
@endsection
@section('content')
    <div class="col-12">
      
        <form action="{{ route('users.store') }}" method="POST">

            @csrf

            <div class="card">
                <div class="card-header bg-dark text-white">
                    Cadastrar Novo Usuário
                </div>
                <div class="card-body">

                    <div class="form-group">
                        <label>Nome</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', '') }}">
                    </div>

                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control" value="{{ old('email', '') }}">
                    </div>

                    <div class="form-group">
                        <label>Senha</label>
                        <input type="password" name="password" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Confirmar senha</label>
                        <input type="password" name="password_confirmation" class="form-control">
                    </div>

                    <div class="form-group">
                        <label>Nível</label>
                        <select name="role" class="form-control">
                            <option {{ old('role', '') == 'admin' ? 'selected' : '' }} value="admin">
                                Administrador
                            </option>
                            <option {{ old('role', '') == 'operator' ? 'selected' : '' }} value="operator">
                                Operador
                            </option>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>

        </form>
        
    </div>
@endsection