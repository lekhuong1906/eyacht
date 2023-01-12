<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\AuthCustomerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\YachtController;
use App\Http\Controllers\RentRegistrationController;
use App\Http\Controllers\LeasesController;
use App\Http\Controllers\StyleController;
use App\Http\Controllers\MarinaController;
use App\Http\Controllers\ImageGalleryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HistoryMooringController;
use App\Http\Controllers\Export\ExportRentRegistrationController;
use App\Http\Controllers\Export\ExportLeasesController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\CheckoutController;

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
//admin login
Route::get('/admin-login', [AdminController::class, 'admin_login'])->name('login');
Route::post('/dashboard', [AdminController::class, 'dashboard']);

//forgot password
Route::get('/forgot-password',[ResetPasswordController::class,'forgot_password']);
Route::post('/send-mail',[ResetPasswordController::class,'send_mail']);
Route::get('/update-new-pass',[ResetPasswordController::class,'update_new_pass']);
Route::post('/reset-new-pass',[ResetPasswordController::class,'reset_new_pass']);

Route::group(['middleware'=>['auth']], function (){
    //dashboard

    Route::get('/show-dashboard', [AdminController::class, 'show_dashboard']);
    Route::get('/logout', [AdminController::class, 'logout']);
    Route::post('/chart',[AdminController::class,'chart']);


    //services
    Route::get('/add-services', [ServiceController::class, 'add_services']);
    Route::get('/all-services', [ServiceController::class, 'all_services']);
    Route::get('/edit-services/{id}', [ServiceController::class, 'edit_services']);
    Route::get('/delete-services/{id}', [ServiceController::class, 'delete_services']);
    Route::post('/save-services', [ServiceController::class, 'save_services']);
    Route::post('/update-services/{id}', [ServiceController::class, 'update_services']);

    //tour admin page
    Route::get('/add-tour',[TourController::class,'add_tour']);
    Route::get('/all-tour',[TourController::class,'all_tour']);
    Route::get('/edit-tour/{id}',[TourController::class,'edit_tour']);
    Route::get('/delete-tour/{id}',[TourController::class,'delete_tour']);
    Route::post('/save-tour',[TourController::class,'save_tour']);
    Route::post('/update-tour/{id}',[TourController::class,'update_tour']);

    //customers
    Route::get('/add-customers', [CustomerController::class, 'add_customers']);
    Route::get('/all-customers', [CustomerController::class, 'all_customers']);
    Route::get('/edit-customers/{id}', [CustomerController::class, 'edit_customers']);
    Route::get('/delete-customers/{id}', [CustomerController::class, 'delete_customers']);
    Route::post('/save-customers', [CustomerController::class, 'save_customers']);
    Route::post('/update-customers/{id}', [CustomerController::class, 'update_customers']);

    //yachts
    Route::get('/add-yachts', [YachtController::class, 'add_yachts']);
    Route::get('/all-yachts', [YachtController::class, 'all_yachts']);
    Route::get('/edit-yachts/{id}', [YachtController::class, 'edit_yachts']);
    Route::get('/delete-yachts/{id}', [YachtController::class, 'delete_yachts']);
    Route::post('/save-yachts', [YachtController::class, 'save_yachts']);
    Route::post('/update-yachts/{id}', [YachtController::class, 'update_yachts']);

    //rent_registration
    Route::get('/add-rent-registration', [RentRegistrationController::class, 'add_rent_registration']);
    Route::get('/all-rent-registration', [RentRegistrationController::class, 'all_rent_registration']);
    Route::get('/edit-rent-registration/{id}', [RentRegistrationController::class, 'edit_rent_registration']);
    Route::get('/delete-rent-registration/{id}', [RentRegistrationController::class, 'delete_rent_registration']);
    Route::get('/add-leases/{id}',[RentRegistrationController::class,'add_leases']);
    Route::post('/save-rent-registration', [RentRegistrationController::class, 'save_rent_registration']);
    Route::post('/update-rent-registration/{id}', [RentRegistrationController::class, 'update_rent_registration']);
    Route::get('/export-rent-regis',[ExportRentRegistrationController::class,'export']);

    //leases
    Route::get('/leases-detail/{id}',[LeasesController::class,'leases_detail']);
    Route::get('/all-leases', [LeasesController::class, 'all_leases']);
    Route::get('/edit-leases/{id}', [LeasesController::class, 'edit_leases']);
    Route::get('/delete-leases/{id}', [LeasesController::class, 'delete_leases']);
    Route::post('/save-leases', [LeasesController::class, 'save_leases']);
    Route::post('/update-leases/{id}', [LeasesController::class, 'update_leases']);
    Route::get('/export-leases/{id}',[ExportLeasesController::class,'export_leases']);

    //style
    Route::get('/add-style', [StyleController::class, 'add_style']);
    Route::get('/all-style', [StyleController::class, 'all_style']);
    Route::get('/edit-style/{id}', [StyleController::class, 'edit_style']);
    Route::get('/delete-style/{id}', [StyleController::class, 'delete_style']);
    Route::post('/save-style', [StyleController::class, 'save_style']);
    Route::post('/update-style/{id}', [StyleController::class, 'update_style']);

    //marina
    Route::get('/add-marina', [MarinaController::class, 'add_marina']);
    Route::get('/all-marina', [MarinaController::class, 'all_marina']);
    Route::get('/edit-marina/{id}', [MarinaController::class, 'edit_marina']);
    Route::get('/delete-marina/{id}', [MarinaController::class, 'delete_marina']);
    Route::post('/save-marina', [MarinaController::class, 'save_marina']);
    Route::post('/update-marina/{id}', [MarinaController::class, 'update_marina']);

    //history_moorings
    Route::get('/update-history-mooring/{id}',[HistoryMooringController::class,'update_history_mooring']);
    Route::get('/all-history-mooring',[HistoryMooringController::class,'all_history_mooring']);
    Route::post('/save-history-mooring/{id}',[HistoryMooringController::class,'save_history_mooring']);

    //gallery
    Route::get('/add-image-gallery', [ImageGalleryController::class, 'add_image_gallery']);
    Route::get('/all-image-gallery', [ImageGalleryController::class, 'all_image_gallery']);
    Route::get('/edit-image-gallery/{id}', [ImageGalleryController::class, 'edit_image_gallery']);
    Route::get('/delete-image-gallery/{id}', [ImageGalleryController::class, 'delete_image_gallery']);
    Route::post('/save-image-gallery', [ImageGalleryController::class, 'save_image_gallery']);
    Route::post('/update-image-gallery/{id}', [ImageGalleryController::class, 'update_image_gallery']);

    //user
    Route::get('/add-user', [UserController::class, 'add_user']);
    Route::get('/all-user', [UserController::class, 'all_user']);
    Route::get('/edit-user/{id}', [UserController::class, 'edit_user']);
    Route::get('/delete-user/{id}', [UserController::class, 'delete_user']);
    Route::post('/save-user', [UserController::class, 'save_user']);
    Route::post('/update-user/{id}', [UserController::class, 'update_user']);
});

//page
Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'home']);
Route::get('/login',[AuthCustomerController::class,'login']);


Route::get('/yacht-detail/{id}', [YachtController::class, 'yacht_detail']);
Route::post('/customer-login',[AuthCustomerController::class,'customer_login']);
Route::get('/log-out',[AuthCustomerController::class,'log_out']);
Route::get('/style-yachts/{id}', [StyleController::class, 'style_yachts']);
Route::get('/marina/{id}',[MarinaController::class, 'show_marina']);


Route::post('/save-customer',[HomeController::class,'save_customer']);
Route::post('/save-rent',[HomeController::class,'save_rent']);

Route::group(['middleware'=>['customer-login']], function (){
    //book yacht
    Route::get('/book-yacht/{id}',[YachtController::class,'book_yacht']);

    //book tour
    Route::get('/book-tour/{id}',[TourController::class,'book_tour']);

    Route::get('/profile',[HomeController::class,'profile']);
});

//tour page
Route::get('/tour-detail/{id}',[TourController::class,'tour_detail']);

Route::get('/checkout/{id}',[CheckoutController::class,'checkout'])->name('checkout');
Route::post('/payment/{id}',[CheckoutController::class,'payment'])->name('payment');







