<?php

use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\PostControllers\PostLoginController;
use App\Http\Controllers\PostControllers\PostLogOutController;
use App\Http\Controllers\PostControllers\PostRegisterController;
use App\Http\Controllers\PostsController\CreateController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', function () {
    return view('posts.index');
})->name('posts');


// Route::get("/posts/register", "PostControllers\PostRegisterController@index");
Route::get("/posts/register", [
    PostRegisterController::class, 'index'
])->name('PostRegister');

Route::get("/posts/login", [PostLoginController::class, 'index'])->name('PostLogin');

Route::post("/posts/login", [
    PostLoginController::class, 'LoginUser'
])->name('PostLoginAction');

Route::post("/posts/register", [
    PostRegisterController::class, 'CreateUser'
])->name('PostRegisterAction');

Route::post("/posts/logout", [
    PostLogOutController::class, 'store'
])->name('PostLogoutAction');

// Route::post("/posts/register")->name("posts.register")->uses(PostRegisterController::class . "@index");

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/posts/dashboard', 
[CreateController::class, 'index'])
->middleware(['auth'])
->name('PostDashboard');

Route::middleware('auth')->group(function () {
    Route::post('posts/dashboard/create', [
        CreateController::class, 'create'])
                ->name('CreatePost');

    Route::post('posts/dashboard/edit', [
        CreateController::class, 'create'])
                ->name('PostEdit');

    Route::post('posts/dashboard/delete', [
        CreateController::class, 'create'])
                ->name('PostDelete');
});

Route::get('/broadcast', function(){
    return  view('broadcast.index');
});
require __DIR__.'/auth.php';
