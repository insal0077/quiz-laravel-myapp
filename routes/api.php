<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookTypeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookAuthorController;

// API Resource routes for the 4 tables (defines index, store, show, update, destroy)
Route::apiResource('authors', AuthorController::class);
Route::apiResource('book-types', BookTypeController::class);
Route::apiResource('books', BookController::class);
Route::apiResource('book-authors', BookAuthorController::class);

// Additional composite-key routes for tblBookAuthor (BookID + AuthorID)
Route::get('book-authors/{bookId}/{authorId}', [BookAuthorController::class, 'show']);
Route::put('book-authors/{bookId}/{authorId}', [BookAuthorController::class, 'update']);
Route::patch('book-authors/{bookId}/{authorId}', [BookAuthorController::class, 'update']);
Route::delete('book-authors/{bookId}/{authorId}', [BookAuthorController::class, 'destroy']);

