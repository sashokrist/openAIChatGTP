<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\OpenAIController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    // Retrieve the returnUrl from the request's query parameters and decode it
    $returnUrl = urldecode(request()->query('returnUrl', '/'));

    return redirect($returnUrl);
})->name('language.switch');


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/openai', [OpenAIController::class, 'index'])->name('openai.index');
    Route::post('/openai/completion', [OpenAIController::class, 'getCompletion']);
    Route::get('/chat-history', [OpenAIController::class, 'fetchChatHistory']);
    Route::get('/chat-content/{id}', [OpenAIController::class, 'getContent']);

    //Post
    Route::post('/post/store', [PostController::class, 'store'])->name('posts.store');
    Route::get('/post/create', [PostController::class, 'create'])->name('posts.create');

    //Comments
    Route::post('/comment/store', [CommentController::class, 'store'])->name('comments.store');

});

//Post
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/post/{id}', [PostController::class, 'show'])->name('posts.show');

require __DIR__.'/auth.php';
