<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Empréstimos</title>

    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
            
                <h1 class="text-center mt-4">Relatório de Empréstimos</h1>

                <table class="table table-bordered mt-4">
                    <thead>
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

    <script>
        window.print();
    </script>
</body>
</html>