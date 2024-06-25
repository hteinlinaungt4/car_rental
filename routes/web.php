<?php

use App\Models\Brand;
use App\Models\Brands;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\VehicleController;
use App\Models\Vehicle;

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

Route::middleware('admin_auth')->group(function(){
    Route::redirect('/', '/user/dashboard');
    Route::get('/register',[AuthController::class,'register'])->name("register");
    Route::get('/login',[AuthController::class,'login'])->name("login");
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard',[AuthController::class,'dashboard']);
    Route::middleware(['admin_auth'])->group(function(){
            Route::get('/count',[AdminController::class,'overallcount'])->name('overallcount');

            Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
            //brand
            Route::resource('brand',BrandController::class);
            Route::get('ssd/brand',[BrandController::class,'ssd']);

            // vechile
            Route::resource('vehicle',VehicleController::class);
            Route::get('ssd/vehicle',[VehicleController::class,'ssd']);

            Route::get('/book',[BookController::class,'index'])->name('book');
            Route::get('ssd/book',[BookController::class,'ssd']);

            Route::post('book/{id}/pending', [BookController::class, 'pending'])->name('book.pending');
            Route::post('book/{id}/confirm', [BookController::class, 'confirm'])->name('book.confirm');
            Route::post('book/{id}/cancel', [BookController::class, 'cancel'])->name('book.cancel');


            Route::get('admin-contact',[ContactController::class,'adminindex'])->name('admin.contact');
            Route::get('ssd/contact',[ContactController::class,'ssd']);
            Route::post('contacts/{id}/status', [ContactController::class, 'updateStatus']);


            Route::get('adminlist',[AdminController::class,'adminlist'])->name('adminlist');
            Route::get('ssd/adminlist',[AdminController::class,'ssd']);
            Route::post('/admintouser/{userId}',[AdminController::class,"admintouser"]);



            Route::get('userlist',[UserController::class,'userlist'])->name('userlist');
            Route::get('ssd/userlist',[UserController::class,'ssd']);
            Route::post('/usertoadmin/{userId}',[UserController::class,"usertoadmin"]);


            Route::get('admin-testimonial',[TestimonialController::class,'adminindex'])->name('admin.test');
            Route::get('ssd/testimonial',[TestimonialController::class,'ssd']);
            Route::post('admin-testimonial/{id}/status', [TestimonialController::class, 'updateStatus']);

            Route::prefix('adminpassword')->group(function(){
                Route::get('changepage',[AdminController::class,'changepasswordpage'])->name('adminpassword#changepage');
                Route::post('change',[AdminController::class,'changepassword'])->name('adminpassword#change');
            });


    });




    //User
    Route::middleware(['user_auth'])->group(function(){
        Route::get('detail/{id}',[UserController::class,'detail'])->name('detail');
        Route::post('book',[BookController::class,'store'])->name('book');
        Route::get('mybook',[BookController::class,'mybook'])->name('mybook');
        Route::get('myprofile',[UserController::class,'myprofile'])->name('myprofile');
        Route::post('myprofile',[UserController::class,'updatemyprofile'])->name('myprofile.update');

        Route::prefix('password')->group(function(){
            Route::get('changepage',[UserController::class,'changepasswordpage'])->name('userpassword#changepage');
            Route::post('change',[UserController::class,'changepassword'])->name('userpassword#change');
        });

        Route::get('testimonial',[TestimonialController::class,'index'])->name('test.index');
        Route::post('testimonial',[TestimonialController::class,'store'])->name('test.store');
        Route::get('mytestimonial',[TestimonialController::class,'mytest'])->name('mytest');


    });


});
Route::get('user/dashboard',[UserController::class,'index'])->name('user.dashboard');
Route::get('contact',[ContactController::class,'index'])->name('contact');
Route::post('contact',[ContactController::class,'store'])->name('contact.store');
Route::get('about',[UserController::class,'about'])->name('about');

