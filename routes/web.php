<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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


Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Home')->name('home');
});
Route::controller(ClientController::class)->group(function () {
    Route::get('/category/{id}/{slug}', 'Categoty')->name('category');
    Route::get('/product-details/{id}/{slug}', 'SingleProduct')->name('singleproduct');
    Route::get('/new-release', 'NewRelease')->name('newrelease');
});

Route::middleware(['auth', 'role:user'])->group(function(){
    Route::controller(ClientController::class)->group(function () {
        Route::get('/add-to-card', 'AddToCard')->name('addtocard');
        Route::get('/delete-card-item/{id}', 'DeleteCard')->name('deletecard');
        Route::post('/add-product-card', 'AddProductCard')->name('addproductcart');
        Route::get('/shipping-address', 'ShippingAddress')->name('shippingaddress');
        Route::post('/add-shipping-address', 'AddShippingAddress')->name('addshippingaddress');
        Route::post('/place-order', 'PlaceOrder')->name('placeorder');
        Route::get('/check-out', 'CheckOut')->name('checkout');
        Route::get('/user-profile', 'UserProfile')->name('userprofile');
        Route::get('/user-profile/pending-orders', 'PendingOrders')->name('pendingorders');
        Route::get('/user-profile/history', 'History')->name('history');
        Route::get('/today-deals', 'TodayDeals')->name('todaydeals');
        Route::get('/customar-service', 'CustomarService')->name('customarservice');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'role:user'])->name('dashboard');

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::controller(DashboardController::class)->group(function () {
        Route::get('/admin/dashboard', 'Index')->name('admindashboard');
    });
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/admin/all-category', 'Index')->name('allcatetory');
        Route::get('/admin/add-category', 'AddCategory')->name('addcatetory');
        Route::post('/admin/store-cat', 'StoreCat')->name('storecategory');
        Route::get('/admin/edit-category/{id}', 'EditCategory')->name('editcategory');
        Route::post('/admin/update-cat', 'UpdateCat')->name('updatecategory');
        Route::get('/admin/delete-category/{id}', 'DeleteCategory')->name('deletecategory');

    });
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/admin/all-subcategory', 'Index')->name('allsubcatetory');
        Route::get('/admin/add-subcategory', 'AddSubCategory')->name('addsubcatetory');
        Route::post('/admin/store-subcategory','SotoreSubCategory')->name('storsubcategory');
        Route::get('admin/edit-sub-category/{id}', 'EditSubCat')->name('editsubcat');
        Route::post('/admin/update-sub-cat', 'UpdateSubCat')->name('updatesubcat');
        Route::get('admin/delete-sub-category/{id}', 'Deletesubcat')->name('deletesubcat');
    });
    Route::controller(ProductController::class)->group(function () {
        Route::get('/admin/all-products', 'Index')->name('allproducts');
        Route::get('/admin/add-product', 'AddProduct')->name('addproduct');
        Route::post('/admin/store-product', 'StoreProduct')->name('storeproduct');
        Route::get('/admin/all-products/{id}', 'EditProductImage')->name('editproductimage');
        Route::post('/admin/update-product-image', 'UpdateProductImage')->name('updateproductimge');
        Route::get('/admin/edit-product/{id}', 'EditProduct')->name('editproduct');
        Route::post('admin/update-product', 'UpdateProduct')->name('updateproduct');
        Route::get('/admin/delete-product/{id}', 'DeleteProduct')->name('deleteproduct');
    });
    Route::controller(OrderController::class)->group(function () {
        Route::get('/admin/pending-order', 'Index')->name('pendingorder');
    });
});




















Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';