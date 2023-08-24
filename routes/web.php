<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

// Register
Route::match(['get', 'post'], '/register', [UserController::class, 'register'])->name('register');
// Login
Route::match(['get', 'post'], '/login', [UserController::class, 'login'])->name('login');
Route::middleware(['auth'])->group(function () {
    // User
    Route::get('/users', [UserController::class, 'listUser'])->name('list_user');
    Route::post('/users/search', [UserController::class, 'listUser'])->name('search_user');
    // Project
    Route::get('/projects', [ProjectController::class, 'listProject'])->name('list_project');
    Route::post('/projects/search', [ProjectController::class, 'listProject'])->name('search_project');
    // Post
    Route::get('/posts', [PostController::class, 'listPost'])->name('list_post');
    Route::post('/posts/search', [PostController::class, 'listPost'])->name('search_post');
    // Banner
    Route::get('/banners', [BannerController::class, 'listBanner'])->name('list_banner');
    Route::post('/banners/search', [BannerController::class, 'listBanner'])->name('search_banner');
    // Student
    Route::get('/students', [StudentController::class, 'listStudent'])->name('list_student');

    Route::middleware(['check.role'])->group(function () {
        // User
        Route::match(['get', 'post'], '/users/add', [UserController::class, 'addUser'])->name('add_user');
        Route::match(['get', 'post'], '/users/edit/{id}', [UserController::class, 'editUser'])->name('edit_user');
        Route::get('/users/delete/{id}', [UserController::class, 'deleteUser'])->name('delete_user');
        // Project
        Route::match(['get', 'post'], '/projects/add', [ProjectController::class, 'addProject'])->name('add_project');
        Route::match(['get', 'post'], '/projects/edit/{id}', [ProjectController::class, 'editProject'])->name('edit_project');
        Route::get('/projects/delete/{id}', [ProjectController::class, 'deleteProject'])->name('delete_project');
        // Post
        Route::match(['get', 'post'], '/posts/add', [PostController::class, 'addPost'])->name('add_post');
        Route::match(['get', 'post'], '/posts/edit/{id}', [PostController::class, 'editPost'])->name('edit_post');
        Route::get('/posts/delete/{id}', [PostController::class, 'deletePost'])->name('delete_post');
        // Banner
        Route::match(['get', 'post'], '/banners/add', [BannerController::class, 'addBanner'])->name('add_banner');
        Route::match(['get', 'post'], '/banners/edit/{id}', [BannerController::class, 'editBanner'])->name('edit_banner');
        Route::get('/banners/delete/{id}', [BannerController::class, 'deleteBanner'])->name('delete_banner');
        // Student
        Route::match(['get', 'post'], '/students/add', [StudentController::class, 'addStudent'])->name('add_student');
        Route::match(['get', 'post'], '/students/edit/{id}', [StudentController::class, 'editStudent'])->name('edit_student');
        Route::get('/students/delete/{id}', [StudentController::class, 'deleteStudent'])->name('delete_student');
    });
    // Logout
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});
