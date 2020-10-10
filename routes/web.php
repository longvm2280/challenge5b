<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangeInfoController;
use App\Http\Controllers\ClassListController;
use App\Http\Controllers\OtherInfoController;
use App\Http\Controllers\HomeworkController;
use App\Http\Controllers\BailamController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\AnswerController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::view('home', 'home')->middleware('auth');
Route::view('home', 'home')->name('home');

Route::get('changeinfo', [ChangeInfoController::class, 'changeinfo'])->middleware('auth');
Route::get('changeinfo', [ChangeInfoController::class, 'changeinfo'])->name('changeinfo');

Route::post('changeinfo', [ChangeInfoController::class, 'update'])->middleware('auth');
Route::post('changeinfo', [ChangeInfoController::class, 'update'])->name('update');

Route::get('classlist', [ClassListController::class, 'classlist'])->middleware('auth');
Route::get('classlist', [ClassListController::class, 'classlist'])->name('classlist');

Route::get('otherinfo', [OtherInfoController::class, 'otherinfo'])->middleware('auth');
Route::get('otherinfo', [OtherInfoController::class, 'otherinfo'])->name('otherinfo');

Route::post('otherinfo', [OtherInfoController::class, 'editmess'])->middleware('auth');
Route::post('otherinfo', [OtherInfoController::class, 'editmess'])->name('otherinfo_mess');

Route::get('homework', [HomeworkController::class, 'index'])->middleware('auth');
Route::get('homework', [HomeworkController::class, 'index'])->name('homework');

Route::post('homework', [HomeworkController::class, 'upload'])->middleware('auth');
Route::post('homework', [HomeworkController::class, 'upload'])->name('upload');

Route::get('homework/{filename}', [HomeworkController::class, 'download'])->middleware('auth');
Route::get('homework/{filename}', [HomeworkController::class, 'download'])->name('download');

Route::get('bailam', [BailamController::class, 'index'])->middleware('auth');
Route::get('bailam', [BailamController::class, 'index'])->name('bailam');

Route::get('bailam/{filename}', [BailamController::class, 'download_bailam'])->middleware('auth');
Route::get('bailam/{filename}', [BailamController::class, 'download_bailam'])->name('download_bailam');

Route::get('challenge', [ChallengeController::class, 'index'])->middleware('auth');
Route::get('challenge', [ChallengeController::class, 'index'])->name('challenge');

Route::post('challenge', [ChallengeController::class, 'upload_challenge'])->middleware('auth');
Route::post('challenge', [ChallengeController::class, 'upload_challenge'])->name('upload_challenge');

Route::get('answer', [AnswerController::class, 'index'])->middleware('auth');
Route::get('answer', [AnswerController::class, 'index'])->name('answer');

Route::post('answer', [AnswerController::class, 'answer'])->middleware('auth');
Route::post('answer', [AnswerController::class, 'answer'])->name('answer');

