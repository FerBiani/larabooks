<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros | Editar</title>
</head>
<body>
    <form action="{{ route('books.update', $book->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label>Nome</label>
        <input name="name" type="text" value="{{ $book->name }}"></input>

        <br>

        <label>Autor</label>
        <input name="author" type="text" value="{{ $book->author }}"></input>

        <br>

        <label>Categoria</label>
        <select name="category">
            <option {{ $book->category == 'Infantil' ? 'selected' : '' }}>Infantil</option>
            <option {{ $book->category == 'Ficção' ? 'selected' : '' }}>Ficção</option>
            <option {{ $book->category == 'Aventura' ? 'selected' : '' }}>Aventura</option>
        </select>

        <br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>