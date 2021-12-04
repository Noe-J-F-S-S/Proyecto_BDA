<?php

// Ubicación de los componentes
use App\Http\Livewire\HomeComponent;
use App\Http\Livewire\ShopComponent;
use App\Http\Livewire\CartComponent;
use App\Http\Livewire\CheckoutComponent;
use App\Http\Livewire\CategoryComponent;
use App\Http\Livewire\DetailsComponent;
use App\Http\Livewire\SearchComponent;
use App\Http\Livewire\ThankyouComponent;
use App\Http\Livewire\User\UserDashboardComponent;
use App\Http\Livewire\User\UserHistorialComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminCategoryComponent;
use App\Http\Livewire\Admin\AdminAddCategoryComponent;
use App\Http\Livewire\Admin\AdminEditCategoryComponent;
use App\Http\Livewire\Admin\AdminProductComponent;
use App\Http\Livewire\Admin\AdminAddProductComponent;
use App\Http\Livewire\Admin\AdminEditProductComponent;
use App\Http\Livewire\Admin\AdminCouponsComponent;
use App\Http\Livewire\Admin\AdminAddCouponComponent;
use App\Http\Livewire\Admin\AdminEditCouponComponent;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', HomeComponent::class);

// Vista de la pestaña Shop
Route::get('/shop', ShopComponent::class)->name('shop');

// Vista de la pestaña Compra
Route::get('/cart', CartComponent::class)->name('product.cart');

// Vista de la pestaña Verificar
Route::get('/checkout', CheckoutComponent::class)->name('checkout');

//Ruta de los detalles de los productos
Route::get('/product/{slug}',DetailsComponent::class)->name('product.details');

//Ruta de las categorias
Route::get('/product-category/{category_slug}',CategoryComponent::class)->name('product.category');

//Ruta de busqueda
Route::get('/search',SearchComponent::class)->name('product.search');

Route::get('/thank-you',ThankyouComponent::class)->name('thankyou');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

// Verificación del usuario o comprador
Route::middleware(['auth:sanctum','verified'])->group(function(){
    Route::get('/user/dashboard',UserDashboardComponent::class)->name('user.dashboard');
    Route::get('/user/historial',UserHistorialComponent::class)->name('user.historial');
});

// Verificación del Administrador
Route::middleware(['auth:sanctum','verified', 'authadmin'])->group(function(){
    Route::get('/admin/dashboard',AdminDashboardComponent::class)->name('admin.dashboard');
    Route::get('/admin/categories',AdminCategoryComponent::class)->name('admin.categories');
    Route::get('/admin/category/add',AdminAddCategoryComponent::class)->name('admin.add.category');
    Route::get('/admin/category/edit/{category_slug}',AdminEditCategoryComponent::class)->name('admin.edit.category');
    Route::get('/admin/products',AdminProductComponent::class)->name('admin.products');
    Route::get('/admin/product/add',AdminAddProductComponent::class)->name('admin.add.product');
    Route::get('/admin/product/edit/{product_slug}',AdminEditProductComponent::class)->name('admin.edit.product');

    Route::get('/admin/coupons',AdminCouponsComponent::class)->name('admin.coupons');
    Route::get('/admin/coupon/add',AdminAddCouponComponent::class)->name('admin.addcoupon');
    Route::get('/admin/coupon/edit/{coupon_id}',AdminEditCouponComponent::class)->name('admin.editcoupon');
});


