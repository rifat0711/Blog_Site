<?php

use App\Http\Controllers\FrontPageController;
use App\Http\Controllers\Learncontroller;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubcategoryController;
use App\Http\Controllers\Admin\Upload_blogController;




// Route::get('/', function () {
    
//     return view('welcome');
// });

Route::get('/',[FrontPageController::class,'index']);





//__Category crud route__//
Route::get('category/index', [CategoryController::class, 'index'])->name('category.index');
Route::get('category/create', [CategoryController::class, 'create'])->name('category.create');
Route::post('category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');

//__SubCategory crud route__//
Route::get('subcategory/index',  [SubcategoryController::class, 'index'])->name('subcategory.index');
Route::get('subcategory/create', [SubcategoryController::class, 'create'])->name('subcategory.create');
Route::post('subcategory/store', [SubcategoryController::class, 'store'])->name('subcategory.store');
Route::get('subcategory/delete/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.delete');
Route::get('subcategory/edit/{id}', [SubcategoryController::class, 'edit'])->name('subcategory.edit');
Route::post('subcategory/update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');


//__Upload blog Route__//
Route::get('upload_blog/index', [Upload_blogController::class, 'index'])->name('upload_blog.index');
Route::get('upload_blog/create', [Upload_blogController::class, 'create'])->name('upload_blog.create');
Route::post('upload_blog/store', [Upload_blogController::class, 'store'])->name('upload_blog.store');
Route::get('upload_blog/delete/{id}', [Upload_blogController::class, 'destroy'])->name('upload_blog.delete');
Route::get('upload_blog/edit/{id}', [Upload_blogController::class, 'edit'])->name('upload_blog.edit');
Route::post('upload_blog/update/{id}', [Upload_blogController::class, 'update'])->name('upload_blog.update');






Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
 
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
