@extends('layouts.app')
@section('title', 'Novo livro')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
</li>
<li class="breadcrumb-item active">
    <a href="{{ route('books.index') }}">Livros</a>
</li>
<li class="breadcrumb-item active">Novo livro</li>
@endsection

@section('content')

    <div class="col-12">

        <form action="{{ route('books.store') }}" method="POST">

            <div class="card">
                <div class="card-header">
                    Cadastrar Novo Livro
                </div>
                <div class="card-body">

                    @csrf

                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <label>Nome</label>
                                <input name="name" type="text" class="form-control"></input>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Autor</label>
                                <input name="author" type="text" class="form-control"></input>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label>Categoria</label>
                                <select name="category" class="form-control">
                                    <option>Infantil</option>
                                    <option>Ficção</option>
                                    <option>Aventura</option>
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

    <div class="col-12">
        
        <form action="{{ route('books.import') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="card">
                <div class="card-header">
                    Importar arquivo CSV
                </div>
                <div class="card-body">

                    <div class="row">

                        <div class="col-12">
                            <div class="form-group">
                                <input name="file" type="file" class="custom-file-input" id="file-input">
                                <label class="custom-file-label" for="file-input" data-browse="Procurar">
                                    Procurar
                                </label>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success">Importar</div>
                </div>

            </div>

        </form>

    </div>

@endsection