<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RentalsController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HelpController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BuyingController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\ExchangeRateController;
use App\Http\Controllers\FelvasarlasController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MotorController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/help', [HomeController::class, 'help'])->name('help');
Route::get('/contacts', [HomeController::class, 'contacts'])->name('contacts');
Route::get('/buying', [HomeController::class, 'buying'])->name('buying');
Route::post('/buying', [HomeController::class, 'buyingstore'])->name('buying.store');
Route::get('admin/buying', [HomeController::class, 'buyingadmin'])->name('admin.buying.index');

Route::get('/motor/{motor}', [HomeController::class, 'show'])->name('motor.show');
Route::get('/motors', [HomeController::class, 'motors'])->name('motors');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/gdpr', [HomeController::class, 'gdpr'])->name('gdpr');

Route::get('/rent/{motor}', [RentalsController::class, 'show'])->name('rent.show');


Route::prefix('/admin')->middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'adminindex'])->name('admin.index');

    Route::get('/visit', [HomeController::class, 'visit'])->name('admin.visit');
    Route::get('/visit/filter/{period}', [HomeController::class, 'visit'])->name('admin.visit.filter');
    Route::get('/visit/custom', [HomeController::class, 'visitCustom'])->name('admin.visit.custom');


    Route::get('/rentals', [RentalsController::class, 'index'])->name('admin.rentals');
    Route::patch('/rentals/updateVisibility/{id}', [RentalsController::class, 'updateVisibility'])->name('rentals.updateVisibility');

    Route::get('/brand', [BrandController::class, 'index'])->name('admin.brand.index');
    Route::get('/brand/create', [BrandController::class, 'create'])->name('admin.brand.create');
    Route::put('/brand/{brand}', [BrandController::class, 'update'])->name('admin.brand.update');
    Route::delete('/brand/{brand}', [BrandController::class, 'destroy'])->name('admin.brand.destroy');
    Route::get('/brand/edit/{brand}', [BrandController::class, 'edit'])->name('admin.brand.edit');
    Route::post('/brand', [BrandController::class, 'store'])->name('admin.brand.store');

    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/edit/{category}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/{category}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/help', [HelpController::class, 'index'])->name('admin.help.index');
    Route::get('/help/create', [HelpController::class, 'create'])->name('admin.help.create');
    Route::post('/help', [HelpController::class, 'store'])->name('admin.help.store');
    Route::get('/help/edit/{help}', [HelpController::class, 'edit'])->name('admin.help.edit');
    Route::put('/help/{help}', [HelpController::class, 'update'])->name('admin.help.update');
    Route::delete('/help/{help}', [HelpController::class, 'destroy'])->name('admin.help.destroy');

    Route::get('/about', [AboutController::class, 'edit'])->name('admin.about.edit');
    Route::put('/about/{about}', [AboutController::class, 'update'])->name('admin.about.update');

    Route::get('/felvasarlas', [FelvasarlasController::class, 'edit'])->name('admin.felvasarlas.edit');
    Route::put('/felvasarlas/{felvasarlas}', [FelvasarlasController::class, 'update'])->name('admin.felvasarlas.update');

    Route::get('/contacts', [ContactsController::class, 'edit'])->name('admin.contacts.edit');
    Route::put('/contacts/{contacts}', [ContactsController::class, 'update'])->name('admin.contacts.update');

    Route::get('/index', [IndexController::class, 'edit'])->name('admin.index.edit');
    Route::put('/index/{index}', [IndexController::class, 'update'])->name('admin.index.update');

    Route::get('/motor', [MotorController::class, 'index'])->name('admin.motor.index');
    Route::get('/motor/archive', [MotorController::class, 'archive'])->name('admin.motor.archive');
    Route::get('/motor/archive/{motor}', [MotorController::class, 'restore'])->name('admin.motor.restore')->withTrashed();
    Route::get('/motor/create', [MotorController::class, 'create'])->name('admin.motor.create');
    Route::post('/motor', [MotorController::class, 'store'])->name('admin.motor.store');
    Route::get('/motor/edit/{motor}', [MotorController::class, 'edit'])->name('admin.motor.edit');
    Route::put('/motor/{motor}', [MotorController::class, 'update'])->name('admin.motor.update');
    Route::delete('/motor/{motor}', [MotorController::class, 'destroy'])->name('admin.motor.destroy')->withTrashed();

    Route::get('/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/user', [UserController::class, 'store'])->name('admin.user.store');
    Route::delete('/user/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
    Route::get('/user/edit/{user}', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::put('/user/{user}', [UserController::class, 'update'])->name('admin.user.update');

    Route::get('/exchangerate', [ExchangeRateController::class, 'index'])->name('admin.exchangerate.index');
    Route::put('/exchangerate/{exchangeRate}', [ExchangeRateController::class, 'update'])->name('admin.exchangerate.update');

    Route::get('/buying', [BuyingController::class, 'index'])->name('admin.buying.index');
    Route::get('/buying/{buying}', [BuyingController::class, 'show'])->name('admin.buying.show');
    Route::delete('/buying/{buying}', [BuyingController::class, 'destroy'])->name('admin.buying.destroy');

});

Route::any('{any}', function () {
    return redirect('/'); // Редирект на главную страницу
})->where('any', '^(?!api).*$');