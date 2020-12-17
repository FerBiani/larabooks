@extends('layouts.app')
@section('title', 'Editar Livro')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{ route('books.index') }}">Livros</a>
</li>
<li class="breadcrumb-item active">Editar Livro</li>
@endsection

@section('content')

    <div class="col-12">

        <form action="{{ route('books.update', $book->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="card">
                <div class="card-header bg-dark text-white">
                    Editar Livro
                </div>
                <div class="card-body">

                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input name="name" type="text" class="form-control" value="{{ $book->name }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Autor</label>
                                <input name="author" type="text" class="form-control" value="{{ $book->author }}">
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Categoria</label>
                                <select name="category" class="form-control">
                                    <option {{ $book->category == 'Infantil' ? 'selected' : '' }}>Infantil</option>
                                    <option {{ $book->category == 'Ficção' ? 'selected' : '' }}>Ficção</option>
                                    <option {{ $book->category == 'Aventura' ? 'selected' : '' }}>Aventura</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
            </div>
        </form>
    
    </div>

@endsection