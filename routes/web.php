<?php

use App\Http\Controllers\frontend\CMSController;
use App\Http\Controllers\ProposController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
    return 'storage-linked';
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

// Route::get('/', function () {
//     return redirect(app()->getLocale());
// });

// Route::group([
//     'prefix' => '{locale}',
//     'middleware' => 'setLocale'
// ], function () {
// });

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

    Route::get('/', [SiteController::class, 'index']);
    Route::get('qui_sommes_nous', [ProposController::class, 'index']);
    Route::get('implantation', [ProposController::class, 'implantation']);
    Route::get('mot_du_president', [ProposController::class, 'mot']);
    Route::get('actualites', [ProposController::class, 'actualite']);
    Route::get('actualites/{id}', [ProposController::class, 'show'])->name('card.show');
    Route::get('contact', [ProposController::class, 'contact']);
    // Route::get('contact', function () {
    //     return view('contact.index');
    // })->name('contact');
    Route::get('/{slug}', [CMSController::class, 'index']);
});

// Route::get('/{slug}/{child_slug}', [ CMSController::class , 'index' ])->name('pages.show');
// Route::get('/{slug}', [ CMSController::class , 'show' ])->name('pages.show');