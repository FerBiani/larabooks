@extends('layouts.app')
@section('title', 'Livros')

@section('breadcrumb')
<li class="breadcrumb-item">
    <a href="{{ route('dashboard.index') }}">Dashboard</a>
</li>
<li class="breadcrumb-item active">Livros</li>
@endsection

@section('content')

    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary text-white">
                Exportação
            </div>
            <div class="card-body">
                <form action="{{ route('books.export') }}" method="POST">
                    @csrf
                    <div class="row align-items-end">
                        <div class="col-12 col-sm-3">
                            <label>Data inicial</label>
                            <input type="text" name="date_start" class="form-control">
                        </div>
                        <div class="col-12 col-sm-3">
                            <label>Data final</label>
                            <input type="text" name="date_end" class="form-control">
                        </div>
                        <div class="col-12 col-sm-3">
                            <label>Tipo de arquivo de exportação</label>
                            <select class="form-control" name="export_file_type">
                                <option value="csv">CSV</option>
                                <option value="xls">XLS</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-3">
                            <button type="submit" class="btn btn-success">Exportar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-12 text-right mt-4">
        <a href="{{ route('books.create') }}" class="btn btn-success">Novo livro</a>
    </div>

    <div class="col-12 mt-4">
        <table class="table table-hover">
            <thead class="thead-dark">
                <tr>
                    <th>Nome</th>
                    <th>Autor</th>
                    <th>Categoria</th>
                    <th colspan="100%">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <td>{{ $book->name }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->category }}</td>
                        <td>
                            <a class="btn btn-warning" href="{{ route('books.edit', $book->id) }}">Editar</a>
                        </td>
                        <td>
                            <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-danger" type="submit">DELETAR</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection