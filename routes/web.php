<?php

use App\Http\Controllers\democontroller;
use App\Http\Controllers\homecontroller;
use App\Http\Controllers\registercontroller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


//get method()
// Route::get('/blog_webpage',[democontroller::class,'index']);
// Route::get('/varun/{$id}',[democontroller::class,'show']);
// //post method()
// Route::get('/blog_webpage/create',[democontroller::class,'create']);
// Route::post('/blog_webpage',[democontroller::class,'store']);
// //put or patch()
// Route::get('/blog_webpage/edit/1',[democontroller::class,'edit']);
// Route::post('/blog_webpage/1',[democontroller::class,'update']);
// //delete
// Route::get('/blog_webpage/1',[democontroller::class,'destroy']);
// //multiple http verbs
// Route::match(['get','post'],'/blog_webpage',[democontroller::class,'index']);
// Route::any('/blog_webpage',[democontroller::class,'index']);
//return view
// Route::view('/blog_webpage','blog_webpage.index',['name'=>"dasineni"]);

// Route::resource('/',democontroller::class,'show');
// Route::get('/',homecontroller::class);
// Route::get('/',[registercontroller::class,'create']);
// Route::post('/register',[registercontroller::class,'store'])->name('register');


// // returns the home page with all posts
// Route::get('/', StudentController::class ,'index')->name('posts.index');
// // returns the form for adding a post
// Route::get('/posts/create', StudentController::class , 'create')->name('posts.create');
// // adds a post to the database
// Route::post('/posts', StudentController::class ,'store')->name('posts.store');
// // returns a page that shows a full post
// Route::get('/posts/{post}', StudentController::class ,'show')->name('posts.show');
// // returns the form for editing a post
// Route::get('/posts/{post}/edit', StudentController::class ,'edit')->name('posts.edit');
// // updates a post
// Route::put('/posts/{post}', StudentController::class ,'update')->name('posts.update');
// // deletes a post
// Route::delete('/posts/{post}', StudentController::class ,'destroy')->name('posts.destroy');




// Route::get('/', [StudentController::class, 'index'])->name('students.index');

// // returns the form for adding a post
// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

// // adds a post to the database
// Route::post('/students', [StudentController::class, 'store'])->name('students.store');

// // returns a page that shows a full post
// Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');

// // returns the form for editing a post
// Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('students.edit');

// // updates a post
// Route::put('/students/{id}', [StudentController::class, 'update'])->name('students.update');

// // deletes a post
// Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('students.destroy');






// Route::get('/', [StudentController::class, 'index'])->name('students.index');


// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');


// Route::post('/students', [StudentController::class, 'store'])->name('students.store');


// Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');


// Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');


// Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');


// Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');





// Route::get('/', [StudentController::class, 'index'])->name('students.index');
// Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
// Route::post('/students', [StudentController::class, 'store'])->name('students.store');
// Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
// Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
// Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
// Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');



Route::get('/', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');




