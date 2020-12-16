<?php

use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function() {
    //Login
    Route::get('login', 'LoginController@index')->name('login.index');
    Route::post('login', 'LoginController@login')->name('login.login');
});

Route::get('logout', 'LoginController@logout')->name('login.logout');

//somente usuário autenticado
Route::middleware('auth')->group(function() {

    //Dashboard
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');

    //Reports
    Route::get('reports/customers', 'ReportController@generateCustomersReport')->name('reports.customers');
    Route::get('reports/lendings', 'ReportController@generateLendingsReport')->name('reports.lendings');

    //Lendings
    Route::resource('lendings', 'LendingController');

    //Customers
    Route::resource('customers', 'CustomerController');

    //User
    Route::resource('users', 'UserController')->middleware('is-admin');

    //Books
    Route::post('books/import', 'BookController@import')->name('books.import');
    // Route::get('books/export', 'BookController@export')->name('books.export');
    Route::post('books/export', 'BookController@export')->name('books.export');

    //GET -> o que é digitado no navegador
    Route::get('/books', 'BookController@index')->name('books.index');
    Route::get('/books/create', 'BookController@create')->name('books.create');
    Route::get('/books/{id}/edit', 'BookController@edit')->name('books.edit');

    //POST -> enviar dados (EX: formulários)
    Route::post('/books', 'BookController@store')->name('books.store');

    //PUT -> atualizar dados (somente em formulários)
    Route::put('/books/{id}', 'BookController@update')->name('books.update');

    //DELETE -> deletar dados (somente em formulários)
    Route::delete('/books/{id}', 'BookController@destroy')->name('books.destroy');

    Route::resource('books', 'BookController');

});