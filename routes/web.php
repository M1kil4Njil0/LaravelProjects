<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return '<a href="'.route('my_page').'">Моя страница</a>';
});

Route::get('/posts', [\App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [\App\Http\Controllers\PostController::class, 'create'])->name('post.create');

Route::post('/posts/store', [\App\Http\Controllers\PostController::class, 'store'])->name('post.store');
Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post.show');
Route::get('/posts/{post}/edit', [\App\Http\Controllers\PostController::class, 'edit'])->name('post.edit');
Route::get('/posts/{post}', [\App\Http\Controllers\PostController::class, 'update'])->name('post.update');
Route::delete('/posts/delete', [\App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete');


Route::get('/posts/first_or_create', [\App\Http\Controllers\PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [\App\Http\Controllers\PostController::class, 'updateOrCreate']);

Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
