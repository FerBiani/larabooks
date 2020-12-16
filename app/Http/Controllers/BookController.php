<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Book;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BookImport;
use App\Exports\BookExport;
use Carbon\Carbon;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        return view('books.index', compact('books'));
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(BookRequest $request)
    {
        // $book = new Book;

        // $book->name = $request->name;
        // $book->author = $request->author;
        // $book->category = $request->category;

        // $book->save();

        // Book::create([
        //     'name' => $request->name,
        //     'author' => $request->author,
        //     'category' => $request->category
        // ]);

        //método alternativo (atualização em massa)
        Book::create($request->all());

        return redirect()->route('books.index')->with('msg_success', 'Livro cadastrado com sucesso!');
    }

    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    public function update(Request $request, $id)
    {
        $book = Book::findOrFail($id);

        $book->name = $request->name;
        $book->author = $request->author;
        $book->category = $request->category;

        $book->save();

        //método alternativo (atualização em massa)
        // $book->update($request->all());

        return redirect()->route('books.index')->with('msg_success', 'Livro atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect()->route('books.index');
    }

    public function import(Request $request)
    {
        $file = $request->files->get('file');

        try {
            Excel::import(new BookImport, $file);
        } catch(\Exception $exception) {
            return back()->with('msg_error', 'Erro ao importar livros!');
        }

        return back()->with('msg_success', 'Livros importados com sucesso!');
    }

    // public function export()
    // {
    //     return Excel::download(new BookExport, 'livros.csv');
    // }

    public function export(Request $request)
    {
        $dateStart = Carbon::parse($request->date_start)->startOfDay();
        $dateEnd = Carbon::parse($request->date_end)->endOfDay();
        $exportFileType = $request->export_file_type;

        return Excel::download(new BookExport($dateStart, $dateEnd), 'livros.' . $exportFileType);
    }
}
