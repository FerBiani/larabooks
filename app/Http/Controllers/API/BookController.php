<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Book;

class BookController extends Controller
{
    public function index(Request $request)
    {
        if ($request->category !== 'all') {
            $books = Book::where('category', $request->category)->get();
        } else {
            $books = Book::all();
        }

        return response()->json($books);
    }

    public function store(Request $request)
    {
        Book::create($request->all());

        return response()->json([
            'message' => 'Livro cadastrado com sucesso!'
        ]);
    }
}
