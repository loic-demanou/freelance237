<?php

use App\Http\Controllers\ConversationController;
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

    Route::get('/confirmProposal/{proposal}', [ProposalController::class, 'confirm'])->name('confirm.proposal');

    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversation.index');

    Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');
    

    Route::get('/createJob', [JobController::class, 'create'])->name('jobs.create');

    Route::post('/createJob/{id}', [JobController::class, 'store'])->name('jobs.store');


    Route::get('/editJob/{id}', [JobController::class, 'edit'])->name('jobs.edit');

    Route::put('/editJob/{id}', [JobController::class, 'update'])->name('jobs.update');



    Route::get('/deleteJob/{id}', [JobController::class, 'delete'])->name('jobs.delete');


});

Route::group(['middleware'=> ['auth', 'proposal']], function(){
    Route::post('submit/{job}', [ProposalController::class, 'store'])->name('proposals.store');
});



