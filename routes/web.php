<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlShortController;
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
    return redirect('/urlshort');
});
Route::get('/urlshort', [UrlShortController::class, 'index']);
Route::get('shorten/{code}', [UrlShortController::class, 'linkShort'])->name('linkShort');
Route::post('/create',[UrlShortController::class,'store']);