<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\BuyNowController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Public pages start

Route::get('/', [PageController::class, 'homepage'])->name('homepage');
Route::get('/aboutpage', [PageController::class, 'aboutpage'])->name('aboutpage');

// Product page
Route::get('/productpage', [PageController::class, 'productpage'])->name('productpage');
Route::get('/viewproductdetail/{id}', [PageController::class, 'viewproductdetail'])->name('viewproductdetail');
Route::get('/categoryproduct/{id}', [PageController::class, 'categoryproduct'])->name('categoryproduct');

//Service page

Route::get('/servicepage', [PageController::class, 'servicepage'])->name('servicepage');
Route::get('/viewservicedetail/{id}', [PageController::class, 'viewservicedetail'])->name('viewservicedetail');
Route::get('/categoryservice/{id}', [PageController::class, 'categoryservice'])->name('categoryservice');


// Search page

Route::get('/search', [PageController::class, 'search'])->name('search');

//searchservice page
Route::get('/searchservice', [PageController::class, 'searchservice'])->name('searchservice');

// Course page
Route::get('/coursepage', [PageController::class, 'coursepage'])->name('coursepage');

// Gallery page

Route::get('/gallerypage', [PageController::class, 'gallerypage'])->name('gallerypage');

// Contact page
Route::get('/contactpage', [PageController::class, 'contactpage'])->name('contactpage');


//google authentication
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');


// Public pages end

Route::middleware(['auth', 'admin'])->group(function () {
    // Staff management routes
    Route::get('/staff', [StaffController::class, 'index'])->name('staff.index');
    Route::get('/staff/create', [StaffController::class, 'create'])->name('staff.create');
    Route::post('/staff/store', [StaffController::class, 'store'])->name('staff.store');
    Route::get('/staff/{id}/edit', [StaffController::class, 'edit'])->name('staff.edit');
    Route::post('/staff/{id}/update', [StaffController::class, 'update'])->name('staff.update');
    Route::delete('/staff/delete', [StaffController::class, 'delete'])->name('staff.delete');

    // Service category management routes
    Route::get('/servicecategory', [ServiceCategoryController::class, 'index'])->name('servicecategory.index');
    Route::get('/servicecategory/create', [ServiceCategoryController::class, 'create'])->name('servicecategory.create');
    Route::post('/servicecategory/store', [ServiceCategoryController::class, 'store'])->name('servicecategory.store');
    Route::get('/servicecategory/{id}/edit', [ServiceCategoryController::class, 'edit'])->name('servicecategory.edit');
    Route::post('/servicecategory/{id}/update', [ServiceCategoryController::class, 'update'])->name('servicecategory.update');
    Route::delete('/servicecategory/delete', [ServiceCategoryController::class, 'delete'])->name('servicecategory.delete');

    // Service management routes
    Route::get('/service', [ServiceController::class, 'index'])->name('service.index');
    Route::get('/service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('/service/store', [ServiceController::class, 'store'])->name('service.store');
    Route::get('/service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::post('/service/{id}/update', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/delete', [ServiceController::class, 'delete'])->name('service.delete');

    // Category management routes
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/{id}/update', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/category/delete', [CategoryController::class, 'delete'])->name('category.delete');

    // Product management routes
    Route::get('/product', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/{id}/update', [ProductController::class, 'update'])->name('product.update');
    Route::delete('/product/delete', [ProductController::class, 'delete'])->name('product.delete');


    // NOTICE management routes
    Route::get('/notice', [NoticeController::class, 'index'])->name('notice.index');
    Route::get('/notice/create', [NoticeController::class, 'create'])->name('notice.create');
    Route::post('/notice/store', [NoticeController::class, 'store'])->name('notice.store');
    Route::get('/notice/{id}/edit', [NoticeController::class, 'edit'])->name('notice.edit');
    Route::post('/notice/{id}/update', [NoticeController::class, 'update'])->name('notice.update');
    Route::delete('/notice/delete', [NoticeController::class, 'delete'])->name('notice.delete');

    //route to send notice to user
    Route::get('/notice/send/{id}', [NoticeController::class, 'sendnotice'])->name('notice.send');


    // Order management routes
    Route::get('/order', [OrderController::class, 'index'])->name('order.index');
    Route::get('/order/{id}/status/{status}', [OrderController::class, 'status'])->name('order.status');


    // Course management routes
    Route::get('/course', [CourseController::class, 'index'])->name('course.index');
    Route::get('/course/create', [CourseController::class, 'create'])->name('course.create');
    Route::post('/course/store', [CourseController::class, 'store'])->name('course.store');
    Route::get('/course/{id}/edit', [CourseController::class, 'edit'])->name('course.edit');
    Route::post('/course/{id}/update', [CourseController::class, 'update'])->name('course.update');
    Route::delete('/course/delete', [CourseController::class, 'delete'])->name('course.delete');


    // Appointment management routes
    Route::get('/appointment/adminviewappointment', [AppointmentController::class, 'show'])->name('appointment.adminviewappointment');
    Route::get('/appointment/{id}/status/{status}', [AppointmentController::class, 'status'])->name('appointment.status');
    //Appointment management end

    // Gallery management routes

    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/create', [galleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/store', [galleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}/edit', [galleryController::class, 'edit'])->name('gallery.edit');
    Route::post('/gallery/{id}/update', [galleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/delete', [galleryController::class, 'delete'])->name('gallery.delete');

    // Gallery management routes end

    // Contact management routes
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    // Contact management routes end


});

// User authentication routes for appointments
Route::middleware(['auth'])->group(function () {
    Route::post('cart/store', [CartController::class, 'store'])->name('cart.store');
    Route::get('mycart', [CartController::class, 'mycart'])->name('mycart');
    Route::get('cart/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('checkout/{cartid}', [PageController::class, 'checkout'])->name('checkout');
    Route::get('order/{cartid}/store', [OrderController::class, 'store'])->name('order.store');
    Route::post('order/store', [OrderController::class, 'storecod'])->name('order.storecod');
    Route::delete('order/destroy', [OrderController::class, 'destroy'])->name('order.destroy');

    Route::get('order/{id}/update', [OrderController::class, 'update'])->name('order.update');





    //Order history
    Route::get('cancelhistory', [OrderController::class, 'orderhistory'])->name('cancelhistory');
    //delete order history
    Route::delete('cancelhistory/destroy', [OrderController::class, 'orderhistorydestroy'])->name('cancelhistory.destroy');





    //buynow
    Route::post('/buy-now/{product}', [BuyNowController::class, 'buyNow'])->name('buynow.buy');
    Route::get('/checkout', [BuyNowController::class, 'checkout'])->name('buynow.checkout');
    Route::post('/place-order', [BuyNowController::class, 'placeOrder'])->name('buynow.placeOrder');
    Route::get('/store/{productid}/{qty}', [BuyNowController::class, 'store'])->name('buynow.store'); // Adjust to POST



    //my order
    Route::get('myorder', [OrderController::class, 'myorder'])->name('myorder');


    // Appointment management routes using resource route
    Route::resource('appointment', AppointmentController::class);
    Route::post('appointment/delete', [AppointmentController::class, 'delete'])->name('appointment.delete');

    // contact management routes
    Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

    // Review management routes

    Route::post('/', [ReviewController::class, 'store'])->name('reviews.store');

    // Review management routes end

    // customer  profile routes

    Route::get('/user', [UserController::class, 'index'])->name('user.index');
});

// Dashboard route for admin
Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', 'admin'])->name('dashboard');




// User profile management routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
