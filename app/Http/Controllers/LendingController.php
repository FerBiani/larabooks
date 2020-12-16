<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Customer, Book, Lending};
use Carbon\Carbon;
use DB;

class LendingController extends Controller
{
    public function index()
    {
        $lendings = Lending::all();

        return view('lendings.index', compact('lendings'));
    }

    public function create()
    {
        $books = Book::all();
        $customers = Customer::all();

        return view('lendings.create', compact('books', 'customers'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $customer = Customer::findOrFail($request->customer['id']);

            $lending = Lending::create([
                'customer_id' => $customer->id,
                'user_id' => auth()->user()->id,
                'return_date' => Carbon::now()->addDays(3)->format('Y-m-d')
            ]);

            foreach ($request->books as $book) {
                $lending->books()->attach($book['id']);
            }

            DB::commit();

        } catch(\Exception $exception) {
            DB::rollback();
            return back()->with('msg_error', 'Erro no servidor ao realizar o empréstimo.');
        }

        return redirect()
            ->route('lendings.index')
            ->with('msg_success', 'Empréstimo realizado com sucesso!');
    }
}
