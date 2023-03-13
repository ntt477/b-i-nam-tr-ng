<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\auth\AuthController;
use App\Http\Controllers\candidate\CandidateController;
use App\Http\Controllers\candidate\BrowseJobController;
use App\Http\Controllers\candidate\ProfileController;
use App\Http\Controllers\candidate\UploadController;
use App\Http\Controllers\candidate\YourCvController;
use App\Http\Controllers\employer\HomeController;
use App\Http\Controllers\employer\ListCandidateController;
use App\Http\Controllers\employer\PostJobController;
use App\Http\Controllers\employer\ProfileEmployerController;
use AuthController as GlobalAuthController;

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


Route::get('/layout', function () {
    return view('layout');
});

Route::prefix('auth')->group(function () {
    Route::get('/login', [AuthController::class, 'showFormLogin'])->name('show_form.login');
    Route::post('/login', [AuthController::class, 'login'])->name('login');

    Route::get('/register', [AuthController::class, 'showFormRegister'])->name('show_form.register');
    Route::post('/register', [AuthController::class, 'register'])->name('register');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::prefix('candidate')->group(function () {
    Route::resource('candidate', CandidateController::class);
    Route::resource('browseJob', BrowseJobController::class);
    Route::resource('profile', ProfileController::class);
    // Route::resource('jobs', CandidateJobController::class)->names('candidate.browsejobs');
    // Route::resource('profile', CandidateProfileController::class)->names('candidate.profile');
    Route::get('upload_cv', [UploadController::class, 'index'] )->name('show_form.upload');
    Route::post('upload_cv', [UploadController::class, 'uploadCV'] )->name('uploadCV');
    Route::get('/your_cv', [YourCvController::class, 'index'])->name('candidate.your_cv');
    Route::get('/viewFile', [YourCvController::class, 'viewFile'])->name('viewFile');
    Route::post('/pickMainCv', [YourCvController::class, 'pickMainCv'])->name('pickMainCv');
});

Route::prefix('employer')->group(function () {
    Route::get('/index', [HomeController::class, 'index'])->name('employer.index');
    Route::get('/candidate', function () {
        return view('employer.candidate');
    })->name('employer.candidate');

    Route::resource('profileEmployer', ProfileEmployerController::class);

    Route::get('/postJob', [PostJobController::class, 'index'])->name('employer.post_job');

    Route::post('/postJob', [PostJobController::class, 'create'])->name('employer.create');

    Route::get('/list_candidate', [ListCandidateController::class, 'index'])->name('employer.list_candidate');
});
