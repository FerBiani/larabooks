<?php

namespace App\Imports;

use App\Book;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BookImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Book([
            'name' => $row['nome'],
            'author' => $row['autor'],
            'category' => $row['categoria']
        ]);
    }
}
