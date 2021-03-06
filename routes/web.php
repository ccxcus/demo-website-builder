<?php

use App\Http\Controllers\WebSiteController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resource('websites', WebSiteController::class)
    ->middleware(['auth']);

Route::match(['get'], 'websites/edit-web/{website}', [WebSiteController::class, 'editWeb'])
->middleware(['auth'])->name('websites.edit-web');

Route::match(['post'], 'websites/edit-web/{website}', [WebSiteController::class, 'editWebUpdate'])
->middleware(['auth'])->name('websites.edit-web');

Route::get('web/{slug}', [WebSiteController::class, 'showWebsite'])
    ->name('websites.show');

require __DIR__.'/auth.php';
