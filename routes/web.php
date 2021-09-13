<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HomeAboutController;
use App\Http\Controllers\ChangePassController;
use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;



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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');



Route::get('/', function () {
    $brands = DB::table('brands')->get();
    $about = DB::table('home_abouts')->first();
    $multipic = Multipic::all();
    return view('home', compact('brands', 'about', 'multipic'));
});
// Route::get('/home', function () {
//     return view('home');
// });
Route::get('/about', function () {
    return view('about');
});

Route::get('/contact-wemch', [ContactController::class, 'index'])->name('contact');

Route::get('/category/all', [CategoryController::class, 'AllCat'])->name('all.category');
Route::post('/category/add', [CategoryController::class, 'AddCat'])->name('store.category');
Route::get('/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('/pdelete/category/{id}', [CategoryController::class, 'PDelete']);

Route::get('/brand/all', [BrandController::class, 'AllBrand'])->name('all.brand');
Route::post('/brand/add', [BrandController::class, 'StoreBrand'])->name('store.brand');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'Update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'Delete']);

Route::get('/pic/all', [BrandController::class, 'AllPic'])->name('all.pic');
Route::post('/pic/add', [BrandController::class, 'StorePic'])->name('store.pic');

//Addmin All route
Route::get('/slider/all', [HomeController::class, 'AllSlider'])->name('all.slider');
Route::get('/slider/add', [HomeController::class, 'AddSlider'])->name('slider.add');
Route::post('/slider/store', [HomeController::class, 'StoreSlider'])->name('store.slider');
Route::get('/brand/edit/{id}', [BrandController::class, 'Edit']);


Route::get('/about/all', [HomeAboutController::class, 'AllAbout'])->name('all.about');
Route::post('/about/store', [HomeAboutController::class, 'StoreAbout'])->name('store.about');
Route::get('/about/add', [HomeAboutController::class, 'Create'])->name('about.add');

Route::get('/portfolio', [HomeAboutController::class, 'Portfolio'])->name('portfolio');

//contact admin
Route::get('/admin/contact', [ContactController::class, 'AllContact'])->name('admin.contact');
Route::get('/add/contact', [ContactController::class, 'Create'])->name('admin.create.contact');
Route::post('/contact/store', [ContactController::class, 'StoreContact'])->name('store.contact');

Route::get('/contact', [ContactController::class, 'Contact']);

Route::get('/admin/message', [ContactController::class, 'AllMessage'])->name('admin.message');
Route::post('/contact_form/store', [ContactController::class, 'ContactForm'])->name('store.contactform');

Route::get('/message/delete/{id}', [ContactController::class, 'DeleteMessage']);

Route::get('/admin/change_password', [ChangePassController::class, 'ChangePassword'])->name('change.password');
Route::post('/password/update', [ChangePassController::class, 'PasswordUpdate'])->name('password.update');

Route::get('/admin/change_profile', [ChangePassController::class, 'ChangeProfile'])->name('change.profile');
Route::post('/profile/update', [ChangePassController::class, 'ProfileUpdate'])->name('profile.update');


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    //$users = User::all();
    //$users = DB::table('users')->get();
    return view('admin.index');
})->name('dashboard');
Route::get('/user/logout', [BrandController::class, 'Logout'])->name('user.logout');
