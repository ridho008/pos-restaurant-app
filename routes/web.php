<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return view('welcome');
    return redirect()->route('login');
});

Route::middleware('auth')->group(function() {
    Route::get('/home', \App\Livewire\Home::class)->name('home');
    Route::get('/profile', \App\Livewire\Auth\Profile::class)->name('profile');
    Route::get('/menus', \App\Livewire\Menu\Index::class)->name('menu.index');
    
    // Customer
    Route::get('/customer', \App\Livewire\Customer\Index::class)->name('customer.index');
    
    // Transaction
    Route::get('/transactions', \App\Livewire\Transaction\Index::class)->name('transaction.index');
    Route::get('/transaction/create', \App\Livewire\Transaction\Actions::class)->name('transaction.create');


});
Route::middleware('guest')->group(function() {
    Route::get('/login', \App\Livewire\Auth\Login::class)->name('login');

});