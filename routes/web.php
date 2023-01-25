<?php

use App\Http\Controllers\CaseStudyController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ResearchController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\QueryController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VolunteerApplicationController;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/team', [HomeController::class,'teams'])->name('team');
Route::get('/becomeVolenteer', [HomeController::class,'volunteer'])->name('volunteer');

// Project
Route::get('/projects', [HomeController::class, 'projects'])->name('projects');
Route::get('/project/{project}', [HomeController::class,'projectDetails'])->name('project');

// Research pages
Route::get('/research', [HomeController::class,'researches'])->name('research');
Route::get('/case', [HomeController::class,'cases'])->name('case');
Route::get('/survey', [HomeController::class,'surveys'])->name('survey');

// Gallery
Route::get('/gallery', [HomeController::class,'galleries'])->name('gallery');
Route::get('/gallery/{gallery}', [HomeController::class,'gallerydetails'])->name('gallerydetails');

// Event
Route::get('/events', [HomeController::class,'events'])->name('events');
Route::get('/event/{event}', [HomeController::class,'eventsdetails'])->name('eventsdetails');

Route::get('/about', function () {return view('about');})->name('about');
Route::get('/contact', function () {return view('contact');})->name('contact');

Route::get('/home/getactiveProjects',[HomeController::class, 'getactiveProjects']);
Route::post('/home/makeDonation',[HomeController::class, 'donate'])->name('makeDonation');
Route::post('/subscribe',[HomeController::class, 'subscribe'])->name('subscribe');

// Contuctus message send ans response
Route::post('/contactUs/send', [QueryController::class, 'store'])->name('contsend');

Route::post('volunteerApplications', [VolunteerApplicationController::class,'store'])->name('volunteerApplications.store');


Route::group(['prefix' => 'email'], function (){
    Route::get('/contactus',function () {
        return view('emails.contactus');
    });
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');



    Route::group(['prefix'=>'dashboard'], function(){
        Route::view('/','dashboard.dashboard')->name('dashboard');
        Route::resource('categories', CategoryController::class);
        Route::resource('projects', ProjectController::class);
        Route::resource('events', EventController::class);
        Route::resource('users', UserController::class);
        Route::resource('permissions', PermissionController::class);
        Route::resource('roles', RoleController::class);
        Route::resource('researches', ResearchController::class);
        Route::resource('casestudies', CaseStudyController::class);
        Route::resource('surveys', SurveyController::class);
        Route::resource('galleries', GalleryController::class);
        Route::resource('subscribers', SubscriberController::class);
        Route::resource('donations', DonationController::class);
        Route::resource('teams', TeamController::class);
        Route::resource('settings', SettingController::class);

        // Volunteer Applications
        Route::resource('volunteerApplications', VolunteerApplicationController::class)->except(['store']);


        // News letters
        Route::group(['prefix' => 'newsletters'], function () {
            Route::get('/', [NewsletterController::class, 'index'])->name('newsletters.index');
            Route::post('/store', [NewsletterController::class, 'store'])->name('newsletters.store');
            Route::get('/show/{newsletter}', [NewsletterController::class, 'show'])->name('newsletters.show');
            Route::post('/send/{newsletter}', [NewsletterController::class, 'send'])->name('newsletters.send');
            Route::delete('/delete/{newsletter}', [NewsletterController::class, 'destroy'])->name('newsletters.destroy');
        });


        // Contuc us query
        Route::group(['prefix' => 'quaries'], function () {
            Route::get('allquaries', [QueryController::class, 'allquaries'])->name('quaries.all');
            Route::get('readed', [QueryController::class, 'readed'])->name('quaries.readed');
            Route::get('unreaded', [QueryController::class, 'unreaded'])->name('quaries.unreaded');
            Route::get('read/{query}', [QueryController::class, 'read'])->name('quaries.read');
            Route::post('replay', [QueryController::class, 'replay'])->name('quaries.replay');
            Route::patch('toggle/{query}', [QueryController::class, 'toggle'])->name('toggleQuery');
            Route::delete('delete/{query}', [QueryController::class, 'destroy'])->name('deleteQuery');
        });
    });


     // Media handeling
     Route::post('/tempUpload', [FileController::class, 'tempUpload']);
     Route::delete('/media/{media}/delete', [FileController::class,'mediaDelete'])->name('mediaDelete');


});

require __DIR__.'/auth.php';
