<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return '<a href="'.route('my_page').'">Моя страница</a>';
});

Route::prefix('posts')->name('post.')->group(function () {
    Route::get('/', [\App\Http\Controllers\Post\IndexController::class, '__invoke'])->name('index');
    Route::get('/create', [\App\Http\Controllers\Post\CreateController::class, '__invoke'])->name('create');
    Route::post('/', [\App\Http\Controllers\Post\StoreController::class, '__invoke'])->name('store');
    Route::get('/{post}', [\App\Http\Controllers\Post\ShowController::class, '__invoke'])->name('show');
    Route::get('/{post}/edit', [\App\Http\Controllers\Post\EditController::class, '__invoke'])->name('edit');
    Route::patch('/{post}', [\App\Http\Controllers\Post\UpdateController::class, '__invoke'])->name('update');
    Route::delete('/{post}', [\App\Http\Controllers\Post\DestroyController::class, '__invoke'])->name('delete');
});


Route::get('/posts/first_or_create', [\App\Http\Controllers\PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [\App\Http\Controllers\PostController::class, 'updateOrCreate']);

Route::get('/main', [\App\Http\Controllers\MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [\App\Http\Controllers\AboutController::class, 'index'])->name('about.index');
