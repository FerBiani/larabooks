@extends('layouts.app')
@section('content')
<div class="card">
    <div class="card-header">
        Cadastrar usuário
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">

            @csrf

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

            <button type="submit" class="btn btn-success">Cadastrar</button>

        </form>
    </div>
</div>
@endsection