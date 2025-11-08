<?php

use App\Http\Controllers\FeedbackCategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('admin/feedback-category',FeedbackCategoryController::class);
    Route::get('/feedback/list', [MainController::class, 'showlistform'])->name('feedback.list');
    Route::get('/feedback/list/{userId}/{categoryId}', [MainController::class, 'showlistformdata'])->name('feedback.listdetails');
    Route::get('/feedback/user-feedback-category/{userId}', [MainController::class, 'showcategory'])->name('feedback.userfeedback');

});

Route::get('/feedback/types', [MainController::class, 'feedbacktypes'])->name('feedback.types');
Route::get('/feedback/showinfo/{userId}/category/{Categoryid}', [MainController::class, 'thankyou'])->name('feedback.showinfo');
Route::get('/feedback/questions/{id}', [MainController::class, 'showQuestions'])->name('feedback.showQuestions');
Route::post('/feedback/submit', [MainController::class, 'submitfeedback'])->name('feedback.store');

require __DIR__.'/auth.php';
