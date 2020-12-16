<?php

namespace App\Exports;

use App\Book;
use Maatwebsite\Excel\Concerns\FromCollection;

class BookExport implements FromCollection
{
    protected $dateStart;
    protected $dateEnd;

    public function __construct($dateStart, $dateEnd)
    {
        $this->dateStart = $dateStart;
        $this->dateEnd = $dateEnd;
    }

    public function collection()
    {
        $books = Book::select('name', 'author', 'category');

        if ($this->dateStart != '') {
            $books = $books->where('created_at', '>=', $this->dateStart);
        }

        if ($this->dateEnd != '') {
            $books = $books->where('created_at', '<=', $this->dateEnd);
        }

        return $books->get();
    }
}
