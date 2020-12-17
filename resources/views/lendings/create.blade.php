@extends('layouts.app')
@section('title', 'Novo Empréstimo')
@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{ route('lendings.index') }}">Empréstimos</a>
</li>
<li class="breadcrumb-item active">Novo Empréstimo</li>
@endsection
@section('content')
    <div class="col-12">
        <form action="{{ route('lendings.store') }}" method="POST">

            @csrf

            <div class="card">
                <div class="card-header bg-dark text-white">
                    Cadastrar Novo Empréstimo
                </div>
                <div class="card-body">

                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Cliente</label>
                                <select name="customer[id]" class="form-control">
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Livro</label>
                                <select name="books[0][id]" class="form-control">
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Livro</label>
                                <select name="books[1][id]" class="form-control">
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12 col-sm-4">
                            <div class="form-group">
                                <label>Livro</label>
                                <select name="books[2][id]" class="form-control">
                                    @foreach($books as $book)
                                        <option value="{{ $book->id }}">{{ $book->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
        </form>
    </div>
@endsection