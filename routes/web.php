<?php

use App\Http\Controllers\DueController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->middleware('auth', 'verified')->name('index');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





Route::get('/project', [ProjectController::class, 'project'])->middleware('auth', 'verified')->name('project');
Route::get('/project_add', [ProjectController::class, 'project_add'])->middleware('auth', 'verified')->name('project.add');
Route::post('/project/store', [ProjectController::class, 'project_store'])->name('project.store');
Route::get('/project/edit/{id}', [ProjectController::class, 'project_edit'])->middleware('auth', 'verified')->name('project.edit');
Route::post('/project/update/{id}', [ProjectController::class, 'project_update'])->name('project.update');

// System Route
Route::get('/system/season', [SeasonController::class, 'season'])->middleware('auth', 'verified')->name('season');
Route::get('/system/season/create', [SeasonController::class, 'season_create'])->middleware('auth', 'verified')->name('season.create');
Route::post('/season/store', [SeasonController::class, 'season_store'])->name('season.store');
Route::get('/season/edit/{id}', [SeasonController::class, 'season_edit'])->name('season.edit');
Route::post('/season/update/{id}', [SeasonController::class, 'season_update'])->name('season.update');

// Income
Route::get('/income', [IncomeController::class, 'income'])->middleware('auth', 'verified')->name('income');
Route::get('/add/income', [IncomeController::class, 'add_income'])->middleware('auth', 'verified')->name('add.income');
Route::post('/income/store', [IncomeController::class, 'income_store'])->name('income.store');
Route::get('/income_edit/{id}', [IncomeController::class, 'income_edit'])->name('income.edit');
Route::post('/income/update/{id}', [IncomeController::class, 'income_update'])->name('income.update');
Route::delete('/income/delete/{id}', [IncomeController::class, 'income_delete'])->name('income.delete');

//Expense
Route::get('/add/expense', [IncomeController::class, 'add_expense'])->middleware('auth', 'verified')->name('add.expense');
Route::post('/expense/store', [IncomeController::class, 'expense_store'])->name('expense.store');
Route::post('/expense/project/store', [IncomeController::class, 'expense_store_project'])->name('expense.store.project');
Route::get('/expense', [IncomeController::class, 'expense'])->middleware('auth', 'verified')->name('expense');
Route::get('/expense_profile', [IncomeController::class, 'expense_profile'])->middleware('auth', 'verified')->name('expense_profile');
Route::post('/expense_profile/store', [IncomeController::class, 'expense_profile_store'])->name('expense_profile_store');
Route::post('/expense_profile_update/{id}', [IncomeController::class, 'expense_profile_update'])->name('expense_profile_update');
Route::get('/expense_profile_show/{id}', [IncomeController::class, 'expense_profile_show'])->middleware('auth', 'verified')->name('expense_profile_show');
Route::delete('/expense/delete/{id}', [IncomeController::class, 'expense_delete'])->name('expense.delete');
Route::get('/trash/expense', [IncomeController::class, 'expense_trash'])->middleware('auth', 'verified')->name('expense.trash');
Route::get('/expense/per/delete/{id}', [IncomeController::class, 'expense_per_delete'])->name('expense.per.delete');
Route::get('/expense/restore/{id}', [IncomeController::class, 'expense_restore'])->name('expense.restore');
Route::get('/expense_profile_filter/{id}', [IncomeController::class, 'expense_profile_filter'])->name('profile.expense.filter');
Route::get('/expense/filter', [IncomeController::class, 'expense_filter'])->name('expense.filter');

// Due Section
Route::get('/dueList', [DueController::class, 'dueList'])->middleware('auth', 'verified')->name('due.list');


// Note Section
Route::get('/note', [NoteController::class, 'note'])->middleware('auth', 'verified')->name('note');
Route::post('/note/store', [NoteController::class, 'note_store'])->middleware('auth', 'verified')->name('note.store');
Route::delete('/note/delete/{id}', [NoteController::class, 'note_delete'])->name('note.delete');
Route::get('/note/edit/{id}', [NoteController::class, 'note_edit'])->middleware('auth', 'verified')->name('note.edit');
Route::post('/note/update/{id}', [NoteController::class, 'note_update'])->name('note.update');

Route::get('/user', [UserController::class, 'user'])->middleware('auth', 'verified')->name('user');
Route::post('/user/store', [UserController::class, 'user_store'])->name('user.store');
Route::get('/user/delete/{id}', [UserController::class, 'user_delete'])->name('user.delete');

Route::get('/note_count', [HomeController::class, 'note_count'])->name('note.count');

require __DIR__.'/auth.php';
