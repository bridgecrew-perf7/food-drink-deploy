<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LocaleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SuggestProductController;
use App\Http\Controllers\admin\ManagerCategoryController;
use App\Http\Controllers\admin\ManagerUserController;
use App\Http\Controllers\admin\ManagerOrderController;
use App\Http\Controllers\admin\ManagerProductController;
use App\Http\Controllers\admin\ManagerStatisticController;
use App\Http\Controllers\admin\ManagerTagController;
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


Route::get('/logout',[LogoutController::class, 'logout']);
Route::get('/admin/login',[LoginController::class, 'login'])->middleware('locale')->name('login_admin');
Route::get('/redirect/{provider}', [SocialController::class,'redirect']);
Route::get('/callback/{provider}', [SocialController::class,'callback']);

Route::group(['middleware' => 'locale'], function() {
    # Change language
    Route::get('change-language/{language}', [LocaleController::class, 'changeLanguage'])
        ->name('change-language');

    # Home page
    Route::get('/', [HomeController::class, 'index'])->name('index');
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    # Group Check login
    Route::group(['middleware' => 'check_login'], function() {
        #Profile page
        Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
        Route::post('/profile/save-infor', [ProfileController::class, 'save_infor'])->name('save_infor');
        Route::post('change-password', [ChangePasswordController::class,'changePassword'])
            ->name('profile.change.password');

        # Order Products
        Route::get('/order-products', [OrderController::class, 'orderProduct'])->name('order-products');

        # Cancel Order
        Route::post('/order-cancel', [OrderController::class, 'cancelOrder'])->name('order-cancel');

        # Suggest Product
        Route::resource('suggest', SuggestProductController::class)->only( 'create', 'store');
    });

    # Route Auth
    Auth::routes();

    # Admin page
    Route::prefix('admin')->middleware('auth','check_role_admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');

        # category
        Route::get('/category/export', [ManagerCategoryController::class,'export'])->name('export_category');
        Route::resource('/category', ManagerCategoryController::class);
        Route::get('/category/getcategory-by-id/{id}', [ManagerCategoryController::class,'getCategoryByID']);
        Route::post('/category/show-hidden/{id}', [ManagerCategoryController::class,'showOrHidden']);
        Route::get('/category/category_type/{id}', [ManagerCategoryController::class, 'showCategoryTy'])->where('id','[0-9]+')->name('showCategoryTy');
        Route::post('/category/import', [ManagerCategoryController::class,'import'])->name('import_category');

        # Product
        Route::get('/product/choose-tag/{id}', [ManagerProductController::class,'chooseTag'])->where('id','[0-9]+')->name('choose_tag');
        Route::get('/product/delete-tag/{id}', [ManagerProductController::class,'deleteTagByIDProduct']);
        Route::get('/product/save-tag', [ManagerProductController::class,'saveTag']);
        Route::get('/product/export', [ManagerProductController::class, 'export'])->name('export_product');
        Route::resource('/product', ManagerProductController::class);
        Route::get('/product/getproduct-by-id/{id}', [ManagerProductController::class,'getProductByID']);
        Route::post('/product/show-hidden/{id}', [ManagerProductController::class,'showOrHidden']);
        Route::get('/product/category/{id}', [ManagerProductController::class, 'showProductByCategory'])->name('show_product_by_category')->where('id','[0-9]+');
        Route::get('/product/category-type/{id}', [ManagerProductController::class, 'showProductByCategoryType'])->name('show_product_by_CategoryType')->where('id','[0-9]+');
        Route::post('/product/import', [ManagerProductController::class,'import'])->name('import_product');
        Route::get('/product/category-multi-level/{id}', [ManagerProductController::class,'categoryByIDCategoryType']);
        Route::get('/product/product-multi-level/{id}', [ManagerProductController::class,'productByIDCategory']);

        # user
        Route::resource('/user', ManagerUserController::class);
        Route::get('/user/get-id-user/{id}', [ManagerUserController::class, 'getIdUser']);
        Route::post('/user/active-block-user/{id}', [ManagerUserController::class, 'activeBlockUser']);
        
        # manager order
        Route::get('/order/all-time', [ManagerOrderController::class, 'getOrderAllTime']);
        Route::get('/order/datetime', [ManagerOrderController::class, 'getOrderByDateTime']);
        Route::get('/order/last-week', [ManagerOrderController::class, 'getOrderLastWeek']);
        Route::get('/order/filter-by-datetime', [ManagerOrderController::class, 'filterByDate']);
        Route::get('/order/status', [ManagerOrderController::class, 'getOrderByStatus']);
        Route::get('/order/export', [ManagerOrderController::class, 'export'])->name('export_order');
        Route::resource('/order', ManagerOrderController::class);
        Route::get('/order/list-product-order/{id}', [ManagerOrderController::class, 'getListProductOrder'])->where('id','[0-9]+');

        # manager statistic 
        Route::get('/statistic/product', [ManagerStatisticController::class, 'statisticProduct'])->name('statistic_product');
        Route::get('/statistic/product/search/{time}', [ManagerStatisticController::class, 'statisticProductSearchTime']);
        Route::get('/statistic/product/last-week', [ManagerStatisticController::class, 'statisticProductLastWeek']);
        Route::get('/statistic/product/export', [ManagerStatisticController::class, 'export'])->name('export_statistic_product');
        Route::get('/statistic/tag', [ManagerStatisticController::class, 'statisticTag'])->name('statistic_tag');
        Route::get('/statistic/tag/search/{time}', [ManagerStatisticController::class, 'statisticTagSearchTime']);
        Route::get('/statistic/tag/last-week', [ManagerStatisticController::class, 'statisticTagLastWeek']);

        # manager tags
        Route::get('/tag/export', [ManagerTagController::class,'export'])->name('export_tag_excel');
        Route::resource('/tag',ManagerTagController::class);
        Route::post('/tag/show-hidden/{id}', [ManagerTagController::class,'showOrHidden']);
        Route::post('/tag/import', [ManagerTagController::class,'import'])->name('import_tag_excel');

    });
    
    # Search Products
    Route::get('/search', [SearchController::class, 'getSearchProducts'])->name('search_products');

    # Search Category Type
    Route::get('/{slug}/category-type', [SearchController::class, 'getCategoryType'])->name('search_category_type')
        ->where('slug', '[A-Za-z]+');
    # Search Category
    Route::get('/{slug}/category', [SearchController::class, 'getCategory'])->name('search_categories');

    # Shopping Cart
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::get('/add-to-cart', [CartController::class, 'addOrUpdate'])->name('cart.add');
    Route::get('/destroy-cart', [CartController::class, 'destroy'])->name('cart.destroy');

    # Product Detail
    Route::get('/{slug}', [ProductController::class, 'getProductDetail'])->name('product_detail');

    # Rating
    Route::post('/rating', [RatingController::class, 'ratingProduct'])->name('rating');

    # menu multi level
    Route::get('/get-category/{id}', [HomeController::class, 'getCategory']);

    # menu tag
    Route::get('/{slug}/tag', [SearchController::class, 'searchProductByTag'])->name('search_tag');

});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});
