<?php

use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [FrontController::class, 'welcome'])->name('welcome');

Route::get('/nuovo/annuncio', [AnnouncementController::class, 'createAnnouncement'])->middleware('auth')->name('announcements.create');
Route::get('/categoria/{category}', [FrontController::class, 'categoryShow'])->name('categoryShow');
Route::get('/dettaglio/annuncio/{announcement}', [AnnouncementController::class, 'showAnnouncement'])->name('announcements.show');
Route::get('/tutti/annunci', [AnnouncementController::class, 'indexAnnouncement'])->name('announcements.index');

//Rotte Revisori
Route::get('/revisor/home', [RevisorController::class, 'index'])->middleware('isRevisor')->name('revisor.index');
Route::patch('/accetta/annuncio/{announcement}', [RevisorController::class, 'acceptAnnouncement'])->middleware('isRevisor')->name('revisor.accept_announcement');
Route::patch('/rifiuta/annuncio/{announcement}', [RevisorController::class, 'rejectAnnouncement'])->middleware('isRevisor')->name('revisor.reject_announcement');
Route::patch('/ripristina/annuncio/{announcement}', [RevisorController::class, 'restoreAnnouncement'])->middleware('isRevisor')->name('revisor.restore_announcement');
Route::get('/cestino/annunci', [RevisorController::class, 'deletedAnnouncement'])->middleware('isRevisor')->name('revisor.deleted');
Route::delete('elimina/annuncio/{announcement}', [RevisorController::class, 'destroy'])->middleware('isRevisor')->name('revisor.destroy');

//Rotte per diventare un revisore
Route::get('/richiesta/revisore', [RevisorController::class, 'becomeRevisor'])->middleware('auth')->name('become.revisor');
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//Rotta per la ricerca
Route::get('/ricerca/annuncio', [FrontController::class, 'searchAnnouncements'])->name('announcements.search');

//Rotta per il cambio lingua
Route::post('lingua/{lang}', [FrontController::class, 'setLanguage'])->name('set_language_locale');

//Rotte per la sezione profilo dell'utente
Route::get('/user/profile', [ProfileController::class, 'userProfileCreate'])->middleware('profileExists')->name('profile.index');
Route::post('/user/profile/post', [ProfileController::class, 'store'])->middleware('profileExists')->name('storeProfile');
Route::get('/user/profile/edit', [ProfileController::class, 'userProfileEdit'])->middleware('editProfileDenied')->name('profile.edit');
Route::put('/user/profile/update', [ProfileController::class, 'update'])->middleware('editProfileDenied')->name('updateProfile');


//Rotta form contattarci

Route::get('/contact', [FrontController::class, 'contactView'])->name('contact');
Route::post('/contact/submit', [FrontController::class, 'submit'])->name('contactSubmit');

//Rotta per il team

Route::get('/team', [FrontController::class, 'teamView'])->name('team');
