<?php

use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ProposalController;
use Illuminate\Routing\RouteGroup;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function () {
    return view('welcome');
})->name('home');


// Route::get('home', [HomeController::class, 'delete'])->name('product.delete');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');




Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');
Route::get('jobs/{id}', [JobController::class, 'show'])->name('jobs.show');


Route::group(['middleware'=> ['auth']], function(){
    Route::get('/dashboard', [JobController::class, 'dashboard'])->name('dashboard');
});

Route::group(['middleware'=> ['auth', 'proposal']], function(){
    Route::post('submit/{job}', [ProposalController::class, 'store'])->name('proposals.store');
});



