<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Book, User, Customer, Lending};

class DashboardController extends Controller
{
    public function index()
    {
        $counts = [
            'books' => Book::count(),
            'users' => User::count(),
            'customers' => Customer::count(),
            'lendings' => Lending::count()
        ];        

        return view('dashboard', compact('counts'));
    }
}
