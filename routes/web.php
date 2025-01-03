<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cartController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\shopController;
use App\Http\Controllers\userController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\wishlistController;
use App\Http\Controllers\ReviewController;

Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
Route::get('/test', [ReviewController::class, 'test']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [homeController::class, 'index'])->name('home');
Route::get('/search', [homeController::class, 'search'])->name('search');


Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user_dashboard', [userController::class,'index'])->name('user_dashboard');
    Route::get('/user_order', [userController::class, 'order'])->name('user_order');
    Route::get('/user_order_details/{id}', [userController::class, 'order_details'])->name('user_order_details');
    Route::PUT('/order_cancel', [userController::class, 'order_cancel'])->name('order_cancel');
    Route::get('/user_profile', [userController::class, 'user_profile'])->name('user_profile');
    Route::get('/address', [userController::class, 'address'])->name('address');
    Route::post('/update_address', [userController::class, 'update_address'])->name('update_address');
});

Route::controller(shopController::class)->group(function(){
    Route::get('/shop', 'index')->name('shop');
    Route::get('/product_details/{product_slug}', 'product_details')->name('product_details');
});

Route::controller(cartController::class)->group(function(){
    Route::post('/add_cart', 'add_to_cart')->name('add_cart');
    Route::get('/cart', 'index')->name('cart');
    Route::post('/checkout', 'place_order')->name('place_order');
    Route::post('/place_order', 'checkout')->name('checkout');
    Route::get('/order_confirmation', 'order_confirmation')->name('order_confirmation');
    Route::DELETE('/clear_cart', 'clear_cart')->name('clear_cart');
    Route::PUT('/increase/{rowId}', 'increase')->name('increase');
    Route::PUT('/decrease/{rowId}', 'decrease')->name('decrease');
    Route::DELETE('/remove_cart_item/{id}', 'remove_cart_item')->name('remove_cart_item');
});

Route::controller(wishlistController::class)->group(function(){
    Route::get('/wishlist', 'index')->name('wishlist');
    Route::PUT('/add_wishlist', 'add_wishlist')->name('add_wishlist');
    Route::post('/move_to_cart/{rowId}', 'move_to_cart')->name('move_to_cart');
    Route::post('/destroy_wishlist/{rowId}', 'destroy_wishlist')->name('destroy_wishlist');
    Route::put('/wishlist_decrease/{rowId}', 'wishlist_decrease')->name('wishlist_decrease');
    Route::put('/wishlist_increase/{rowId}', 'wishlist_increase')->name('wishlist_increase');
    Route::DELETE('/remove_wishlist', 'remove_wishlist')->name('remove_wishlist');
    Route::post('/all_move_cart', 'all_move_cart')->name('all_move_cart');
});


//login-bugg
//login-bugg

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin_dashboard', [adminController::class,'index'])->name('admin_dashboard');

    Route::get('/brand', [adminController::class,'brand'])->name('brand');
    Route::get('/add_brand', [adminController::class,'add_brand'])->name('add_brand');
    Route::post('/create_brand', [adminController::class,'create_brand'])->name('create_brand');
    Route::get('/edit_brand/{id}', [adminController::class,'edit_brand'])->name('edit_brand');
    Route::put('/update_brand/{id}', [adminController::class,'update_brand'])->name('update_brand');
    Route::get('/delete_brand/{id}', [adminController::class,'delete_brand'])->name('delete_brand');

    Route::get('/category', [adminController::class, 'category'])->name('category');
    Route::post('/category_select', [adminController::class, 'category_select'])->name('category_select');
    Route::get('/add_category', [adminController::class, 'add_category'])->name('add_category');
    Route::post('/create_category', [adminController::class, 'create_category'])->name('create_category');
    Route::get('/edit_category/{id}', [adminController::class, 'edit_category'])->name('edit_category');
    Route::put('/update_category/{id}', [adminController::class, 'update_category'])->name('update_category');
    Route::get('/delete_category/{id}', [adminController::class, 'delete_category'])->name('delete_category');

    Route::get('add_subcategory', [adminController::class,'add_subcategory'])->name('add_subcategory');
    Route::post('create_subcategory', [adminController::class,'create_subcategory'])->name('create_subcategory');
    Route::get('edit_subcategory/{id}', [adminController::class,'edit_subcategory'])->name('edit_subcategory');
    Route::PUT('update_subcategory/{id}', [adminController::class,'update_subcategory'])->name('update_subcategory');
    Route::get('delete_subcategory/{id}', [adminController::class,'delete_subcategory'])->name('delete_subcategory');

    Route::get('product',[adminController::class,'product'])->name('product');
    Route::get('add_product', [adminController::class,'add_product'])->name('add_product');
    Route::post('create_product', [adminController::class,'create_product'])->name('create_product');
    Route::get('edit_product/{id}', [adminController::class,'edit_product'])->name('edit_product');
    Route::PUT('update_product/{id}', [adminController::class,'update_product'])->name('update_product');
    Route::get('delete_images/{id}', [adminController::class,'delete_images'])->name('delete_images');
    Route::get('delete_product/{id}', [adminController::class,'delete_product'])->name('delete_product');

    Route::get('order', [adminController::class,'order'])->name('order');
    Route::get('order_details/{id}', [adminController::class,'order_details'])->name('order_details');
    Route::post('update_status', [adminController::class,'update_status'])->name('update_status');

    Route::get('/slide', [adminController::class,'slide'])->name('slide');
    Route::get('/add_slide', [adminController::class,'add_slide'])->name('add_slide');
    Route::post('/create_slider', [adminController::class,'create_slider'])->name('create_slider');
    Route::get('/edit_slider/{id}', [adminController::class,'edit_slider'])->name('edit_slider');
    Route::PUT('/update_slider/{id}', [adminController::class,'update_slider'])->name('update_slider');
    Route::get('/delete_slider/{id}',[adminController::class,'delete_slider'])->name('delete_slider');

    Route::get('/left_side_banner', [adminController::class, 'left_side_banner'])->name('left_side_banner');
    Route::get('/add_leftside_banner', [adminController::class, 'add_leftside_banner'])->name('add_leftside_banner');
    Route::post('/create_sidebar_banner', [adminController::class, 'create_sidebar_banner'])->name('create_sidebar_banner');
    Route::get('/edit_sidebar_banner/{id}', [adminController::class,'edit_sidebar_banner'])->name('edit_sidebar_banner');
    Route::Put('/update_sidebar_banner/{id}', [adminController::class, 'update_sidebar_banner'])->name('update_sidebar_banner');
    Route::Put('/delete_sidebar_banner/{id}', [adminController::class,'delete_sidebar_banner'])->name('delete_sidebar_banner');

    Route::get('/weekend_banner', [adminController::class, 'weekend_banner'])->name('weekend_banner');
    Route::get('/add_weekend_banner', [adminController::class, 'add_weekend_banner'])->name('add_weekend_banner');
    Route::post('/create_weekend_banner', [adminController::class, 'create_weekend_banner'])->name('create_weekend_banner');
    Route::get('/edit_weekend_banner/{id}', [adminController::class, 'edit_weekend_banner'])->name('edit_weekend_banner');
    Route::PUT('/update_weekend_banner/{id}', [adminController::class, 'update_weekend_banner'])->name('update_weekend_banner');
    Route::PUT('/delete_weekend_banner/{id}', [adminController::class, 'delete_weekend_banner'])->name('delete_weekend_banner');

    Route::get('/admin_profile', [adminController::class, 'admin_profile'])->name('admin_profile');

    Route::get('/customer', [adminController::class, 'customer'])->name('customer');
    Route::get('/cus_detils_view/{id}', [adminController::class, 'cus_detils_view'])->name('cus_detils_view');
    Route::get('/cus_delete/{id}', [adminController::class, 'cus_delete'])->name('cus_delete');
    Route::get('/order_details_delete/{id}', [adminController::class, 'order_details_delete'])->name('order_details_delete');

    Route::get('/even_management', [adminController::class, 'even_management'])->name('even_management');

    Route::get('/invoice', [adminController::class, 'invoice'])->name('invoice');
    Route::get('/add_invoice', [adminController::class, 'add_invoice'])->name('add_invoice');

    Route::get('/pages', [adminController::class, 'pages'])->name('pages');
    Route::get('/add_menu', [adminController::class, 'add_menu'])->name('add_menu');
    Route::post('/create_menu', [adminController::class, 'create_menu'])->name('create_menu');
    Route::get('/delete_menu/{id}', [adminController::class, 'delete_menu'])->name('delete_menu');

    Route::get('/add_submenu', [adminController::class, 'add_submenu'])->name('add_submenu');
    Route::get('/edit_sub_menu/{id}', [adminController::class, 'edit_sub_menu'])->name('edit_sub_menu');
    Route::put('/update_submenu/{id}', [adminController::class, 'update_submenu'])->name('update_submenu');
    Route::get('/delete_sub_menu/{id}', [adminController::class, 'delete_sub_menu'])->name('delete_sub_menu');

    Route::post('/create_submenu', [adminController::class, 'create_submenu'])->name('create_submenu');
    Route::get('/edit_menu/{id}', [adminController::class, 'edit_menu'])->name('edit_menu');
    Route::put('/update_menu/{id}', [adminController::class, 'update_menu'])->name('update_menu');

    Route::get('/sales', [adminController::class, 'sales'])->name('sales');
    Route::get('/add_sales', [adminController::class, 'add_sales'])->name('add_sales');
    Route::post('/add_sals_product', [adminController::class, 'add_sals_product'])->name('add_sals_product');
    Route::get('/search_product', [adminController::class, 'search_product'])->name('search_product');
    Route::get('/edit_sales/{id}', [adminController::class, 'edit_sales'])->name('edit_sales');
    Route::post('/hold_product', [adminController::class, 'hold_product'])->name('hold_product');
});







require __DIR__.'/auth.php';


