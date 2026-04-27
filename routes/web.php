<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\SimpleAuth;
use App\Http\Controllers\ItemController;

//User
Route::middleware(SimpleAuth::class . ':user')->group(function() {
    Route::get('/', [ItemController::class, 'userPage'])->name('user.page');
});

//Admin
Route::middleware(SimpleAuth::class . ':admin')->group(function() {
    //Read
    Route::get('/admin', [ItemController::class, 'adminPage'])->name('admin.page');
    //Create
    Route::get('/create', [ItemController::class, 'showCreate'])->name('showCreate');
    Route::post('/create', [ItemController::class, 'create'])->name('create');
    //Update
    Route::get('/update/{id}', [ItemController::class, 'showUpdate'])->name('showUpdate');
    Route::patch('/update/{id}', [ItemController::class, 'update'])->name('update');
    //Delete
    Route::delete('/delete{id}', [ItemController::class, 'delete'])->name('delete');
});


require __DIR__.'/auth.php';
