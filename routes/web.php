<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\PublicProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\CVController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Include auth routes
require __DIR__.'/auth.php';

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('profile.edit');
    }
    return view('profile.public', ['user' => null]); // Or a landing page if you prefer
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/pdf/{username}', [PDFController::class, 'generate'])->name('pdf.generate');
    Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::post('/skills', [SkillController::class, 'store'])->name('skills.store');
    Route::get('/skills/{skill}/edit', [SkillController::class, 'edit'])->name('skills.edit');
    Route::put('/skills/{skill}', [SkillController::class, 'update'])->name('skills.update');
    Route::delete('/skills/{skill}', [SkillController::class, 'destroy'])->name('skills.destroy');
    Route::post('/cv/generate', [CVController::class, 'generate'])->name('cv.generate');
    Route::get('/cv/download', [CVController::class, 'download'])->name('cv.download');
    Route::get('/projects/{project}/edit', [ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/projects/{project}', [ProjectController::class, 'update'])->name('projects.update');
});

Route::get('/profile/{username}', [ProfileController::class, 'show'])->name('profile.show');
