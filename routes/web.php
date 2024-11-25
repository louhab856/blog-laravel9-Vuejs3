<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class, 'index'] );
Route::get('{category}/posts',[HomeController::class, 'postsByCategorie'])->name('category.posts');
Route::get('change/lang/{lang}', [HomeController::class,'changeLang'])->name('change.lang');
Route::resource('posts', PostController::class);
