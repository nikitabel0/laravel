<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[MainController::class, 'index']);

Route::get('/article/{img}', function($img){
    return view("pages/article",['img'=>$img]);
});

Route::get('/about', function () {
    return view('pages/about');
});
Route::get('/contacts', function () {
    $data = [
        'city'=>'Москва',
        'street'=>'ул. Большая Семёновская',
        'house'=>'д. 38'
    ];
    return view('pages/contacts',['data'=>$data]);  
});


//auth

Route::get('/auth/signup',[AuthController::class,'signup']);
Route::post('/auth/registration',[AuthController::class,'registration']);

Route::resource('articles',ArticleController::class);

//comm
Route::post('/comment',[commentController::class,'store']);

Route::get('/comment/{id}/edit',[commentController::class,'edit']);
Route::post('/comment{comment/update}',[commentController::class,'update']);
Route::get('/comment{comment/delete}',[commentController::class,'destroy']);

Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/authenticate', [AuthController::class, 'authenticate']);
Route::get('/auth/logout', [AuthController::class, 'logout']);
