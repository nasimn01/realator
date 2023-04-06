<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController as auth;
use App\Http\Controllers\DashboardController as dash;
use App\Http\Controllers\Settings\UserController as user;
use App\Http\Controllers\Settings\AdminUserController as admin;
use App\Http\Controllers\Settings\Location\CountryController as country;
use App\Http\Controllers\Settings\Location\DivisionController as division;
use App\Http\Controllers\Settings\Location\DistrictController as district;
use App\Http\Controllers\Settings\Location\UpazilaController as upazila;
use App\Http\Controllers\Settings\Location\ThanaController as thana;

use App\Http\Controllers\FrontendController as front;
use App\Http\Controllers\HomePageController as home;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\FounderController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\AdvanceFeatureController;
use App\Http\Controllers\AmenetiesController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\PropertyCategoryController as cat;
use App\Http\Controllers\PropertyPhotoController as proPhoto;
use App\Http\Controllers\CustomerReviewController as review;
use App\Http\Controllers\BlogController as blog;
use App\Http\Controllers\AboutUsController as about;
use App\Http\Controllers\AboutUsMotiveController as aboutMotive;


/* Middleware */
use App\Http\Middleware\isMember;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isOwner;
use App\Http\Middleware\isSalesmanager;
use App\Http\Middleware\isSalesman;

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

Route::get('/', [front::class,'index'])->name('front');
Route::get('/register', [auth::class,'signUpForm'])->name('register');
Route::post('/register', [auth::class,'signUpStore'])->name('register.store');
Route::get('/admin', [auth::class,'signInForm'])->name('signIn');
Route::get('/login', [auth::class,'signInForm'])->name('login');
Route::post('/login', [auth::class,'signInCheck'])->name('login.check');
Route::get('/logout', [auth::class,'singOut'])->name('logOut');

/* About Page */
Route::get('/about.page', [front::class, 'aboutUs'])->name('about.page');

/* search property */
Route::get('/search', [front::class, 'search'])->name('search');

/* single property */
Route::get('/singleProp/{slug}',[front::class,'singleProperty'])->name('sProperty');
/* Subscriber email */
Route::post('/subscriber',[front::class,'subscriber'])->name('subscriber.email');

Route::group(['middleware'=>isAdmin::class],function(){
    Route::prefix('admin')->group(function(){
        Route::get('/dashboard', [dash::class,'adminDashboard'])->name('admin.dashboard');
        /* settings */
        Route::resource('users',user::class,['as'=>'admin']);
        Route::resource('admin',admin::class,['as'=>'admin']);
        Route::resource('country',country::class,['as'=>'admin']);
        Route::resource('division',division::class,['as'=>'admin']);
        Route::resource('district',district::class,['as'=>'admin']);
        Route::resource('upazila',upazila::class,['as'=>'admin']);
        Route::resource('thana',thana::class,['as'=>'admin']);
        Route::resource('unit',unit::class,['as'=>'admin']);

        Route::resource('home',home::class,['as'=>'admin']);
        Route::resource('slider',SliderController::class,['as'=>'admin']);
        Route::resource('founder',FounderController::class,['as'=>'admin']);
        Route::resource('location',LocationController::class,['as'=>'admin']);
        Route::resource('advance',AdvanceFeatureController::class,['as'=>'admin']);
        Route::resource('ameneties',AmenetiesController::class,['as'=>'admin']);
        Route::resource('property',PropertyController::class,['as'=>'admin']);
        Route::resource('category',cat::class,['as'=>'admin']);
        Route::resource('proPhoto',proPhoto::class,['as'=>'admin']);
        Route::resource('review',review::class,['as'=>'admin']);
        Route::resource('blog',blog::class,['as'=>'admin']);
        Route::resource('about',about::class,['as'=>'admin']);
        Route::resource('aboutMotive',aboutMotive::class,['as'=>'admin']);

    });
});

Route::group(['middleware'=>isOwner::class],function(){
    Route::prefix('owner')->group(function(){
        Route::get('/dashboard', [dash::class,'ownerDashboard'])->name('owner.dashboard');
        Route::resource('users',user::class,['as'=>'owner']);
    });
});

Route::group(['middleware'=>isSalesmanager::class],function(){
    Route::prefix('salesmanager')->group(function(){
        Route::get('/dashboard', [dash::class,'salesmanagerDashboard'])->name('salesmanager.dashboard');

    });
});

Route::group(['middleware'=>isSalesman::class],function(){
    Route::prefix('salesman')->group(function(){
        Route::get('/dashboard', [dash::class,'salesmanDashboard'])->name('salesman.dashboard');

    });
});
Route::group(['middleware'=>isMember::class],function(){
    Route::prefix('member')->group(function(){
        Route::get('/loggedMem', [dash::class,'memDashboard'])->name('member.memdashboard');
        

    });
});


