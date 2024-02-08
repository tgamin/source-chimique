<?php

use App\Http\Controllers\Frontend\CMSController;
use App\Http\Controllers\MarqueController;
use App\Http\Controllers\ProposController;
use App\Http\Controllers\SiteController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/foo', function () {
    Artisan::call('storage:link');
});


Route::get('/cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    return 'cache-cleard';
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

Route::get('/', [SiteController::class, 'index']);
Route::get('/qui_sommes_nous', [ProposController::class, 'index']);
Route::get('mot_du_president', [ProposController::class, 'mot']);
Route::get('/contact', function(){
    return view('contact.index');
})->name('contact');

Route::get('oni/{slug}', [MarqueController::class, 'oni']);
Route::get('hance/{slug}', [MarqueController::class, 'hance']);
Route::get('drem/{slug}', [MarqueController::class, 'drem']);
Route::get('lelas/{slug}', [MarqueController::class, 'lelas']);

// Route::get('/{slug}/{child_slug}', [ CMSController::class , 'index' ])->name('pages.show');
// Route::get('/{slug}', [ CMSController::class , 'show' ])->name('pages.show');

Route::get('/{slug}', [ CMSController::class , 'index' ])->name('pages.show');
