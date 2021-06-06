<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminJobController;
use App\Http\Controllers\AdminRoleController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\ConversationController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

use App\Http\Controllers\UserController;

use App\Http\Controllers\ProposalController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;

use App\Http\Controllers\UserDetailController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\ResumeProposalController;
use App\Http\Controllers\TestController;
use Illuminate\Routing\RouteGroup;
use Laravel\Socialite\Facades\Socialite;


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
})->name('home');

Route::get('admin', [AdminController::class, 'index'])->name('admin.index');

Route::get('admin/roles', [AdminRoleController::class, 'index'])->name('adminRole.index');

Route::get('admin/users-management', [AdminUserController::class, 'index'])->name('adminUser.index');

Route::get('admin/jobs-management', [AdminJobController::class, 'index'])->name('adminJob.index');




Route::get('/login/google', [LoginController::class, 'redirectToProvider'])->name('loginGoogle');

Route::get('/login/google/callback', [LoginController::class, 'handleProviderCallback']);


// Route::get('home', [HomeController::class, 'delete'])->name('product.delete');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::get('products', [ProductController::class, 'list'])->name('products.list');

Route::get('/candidates', [UserController::class, 'list'])->name('candidates.list');
Route::get('/search', [UserController::class, 'search'])->name('candidates.search');



Route::get('jobs', [JobController::class, 'index'])->name('jobs.index');

Route::get('jobs/{id}', [JobController::class, 'show'])->name('jobs.show');


Route::group(['middleware'=> ['auth']], function(){

    Route::get('/dashboard', [JobController::class, 'dashboard'])->name('dashboard');

    Route::get('/confirmProposal/{proposal}', [ProposalController::class, 'confirm'])->name('confirm.proposal');

    Route::get('/cancelProposal/{proposal}', [ProposalController::class, 'cancel'])->name('cancel.proposal');



    Route::get('/message/{user}', [ConversationController::class, 'create'])->name('message.create');

    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversation.index');

    Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversation.show');



    Route::get('/createJob', [JobController::class, 'create'])->name('jobs.create');

    Route::post('/createJob/{id}', [JobController::class, 'store'])->name('jobs.store');

    Route::get('/editJob/{id}', [JobController::class, 'edit'])->name('jobs.edit');

    Route::put('/editJob/{id}', [JobController::class, 'update'])->name('jobs.update');

    Route::get('/deleteJob/{id}', [JobController::class, 'delete'])->name('jobs.delete');


        // the CVs controllers

        Route::get('user-detail', [UserDetailController::class, 'index'])->name('user-detail.index');
        Route::get('user-detail/create', [UserDetailController::class, 'create'])->name('user-detail.create');
        Route::post('user-detail/create', [UserDetailController::class, 'store'])->name('user-detail.store');
        Route::get('user-detail/edit/{user_detail}', [UserDetailController::class, 'edit'])->name('user-detail.edit');
        Route::put('user-detail/edit/{user_detail}', [UserDetailController::class, 'update'])->name('user-detail.update');
        Route::get('user-detail/delete/{user_detail}', [UserDetailController::class, 'destroy'])->name('user-detail.destroy');


        Route::get('education', [EducationController::class, 'index'])->name('education.index');
        Route::get('education/create', [EducationController::class, 'create'])->name('education.create');
        Route::post('education/create', [EducationController::class, 'store'])->name('education.store');
        Route::get('education/edit/{education}', [EducationController::class, 'edit'])->name('education.edit');
        Route::put('education/edit/{education}', [EducationController::class, 'update'])->name('education.update');
        Route::get('education/delete/{education}', [EducationController::class, 'destroy'])->name('education.destroy');


        Route::get('experience', [ExperienceController::class, 'index'])->name('experience.index');
        Route::get('experience/create', [ExperienceController::class, 'create'])->name('experience.create');
        Route::post('experience/create', [ExperienceController::class, 'store'])->name('experience.store');
        Route::get('experience/edit/{experience}', [ExperienceController::class, 'edit'])->name('experience.edit');
        Route::put('experience/edit/{experience}', [ExperienceController::class, 'update'])->name('experience.update');
        Route::get('experience/delete/{experience}', [ExperienceController::class, 'destroy'])->name('experience.destroy');


        Route::get('skill', [SkillController::class, 'index'])->name('skill.index');
        Route::get('skill/create', [SkillController::class, 'create'])->name('skill.create');
        Route::post('skill/create', [SkillController::class, 'store'])->name('skill.store');
        Route::get('skill/edit/{skill}', [SkillController::class, 'edit'])->name('skill.edit');
        Route::put('skill/edit/{skill}', [SkillController::class, 'update'])->name('skill.update');
        Route::get('skill/delete/{skill}', [SkillController::class, 'destroy'])->name('skill.destroy');


        Route::get('resume', [ResumeController::class, 'index'])->name('resume.index');
        Route::get('resume/download', [ResumeController::class, 'download'])->name('resume.download');

        // routes that show and download the cv of the users that sent thier proposals

        Route::get('resumeProposal', [ResumeProposalController::class, 'index'])->name('resume-proposal.index');
        Route::get('resumeProposal/download', [ResumeProposalController::class, 'download'])->name('resume-proposal.download');


        // end CVs controllers


});

Route::group(['middleware'=> ['auth', 'proposal']], function(){
    Route::post('submit/{job}', [ProposalController::class, 'store'])->name('proposals.store');

    // Route::get('/deleteProposal', [ProposalController::class, 'delete'])->name('delete.proposal');

});



