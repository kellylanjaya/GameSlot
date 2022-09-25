<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TransactionController;
use App\Models\Cart;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[PageController::class,'HomePage']);


Route::get('/register',[PageController::class,'toRegister'])->middleware('guest');

Route::get('/login',[PageController::class,'toLogin'])->middleware('guest');

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/transaction', function () {
    return view('transaction');
});

Route::get('/ManageGenre',[PageController::class,'ManageGenre'])->middleware('Admin');
Route::get('/toAddGenre',[PageController::class,'toAddGenre'])->middleware('Admin');
Route::get('/UpdateGenre/{id}',[PageController::class,'UpdateGenre']);
Route::get('/ManageGame',[PageController::class,'ManageGame'])->middleware('Admin');
Route::get('/toAddGame',[PageController::class,'toAddGame'])->middleware('Admin');
Route::get('/profile',[PageController::class,'profile']);
Route::get('/toUpdateGame/{id}',[PageController::class,'toUpdateGame']);
Route::get('/DetailGame/{id}',[PageController::class,'toGameDetail']);
Route::get('/myCart/{id}',[PageController::class,'myCart']);
Route::get('/historyTransaction',[PageController::class,'toTransaction']);
Route::get('/toTransactionDetail/{id}',[PageController::class,'toTransactionDetails']);

// User controller
Route::post('/register/registerUser',[UserController::class,'registUser']);
Route::post('/login/loginUser',[UserController::class,'loginUser']);
Route::get('/logout',[UserController::class,'logout']);
Route::post('/profile/edit/{id}',[UserController::class,'updateProfile']);
Route::post('/profile/editPassword/{id}',[UserController::class,'updatePassword']);

//genre controller
Route::get('/deleteGenre/{id}',[GenreController::class,'deleteGenre']);
Route::post('/UpdateGenre/update/{id}',[GenreController::class,'UpdateGenre']);
Route::post('/addGenre',[GenreController::class,'addGenre']);

//game controller
Route::post('/addGame',[GameController::class,'addGame']);
Route::get('/deleteGame/{id}',[GameController::class,'deleteGame']);
Route::post('/updateGame/{id}',[GameController::class,'updateGame']);

//cart controller
route::post('/AddCart/{id}',[CartController::class,'addCart']);
Route::get('/MyCart',[CartController::class, 'showCart']);
Route::get('/deleteCart/{id}',[CartController::class,'deleteCart']);
Route::post('/updateQuantity/{id}',[CartController::class,'updateQuantity']);

//transaction contoller
route::get('/checkOut',[TransactionController::class,'checkOut']);

Route::get('/search', [PageController::class, 'search']);
