<?php
use Illuminate\Support\Facades\Mail;

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

Route::group(['middleware' => ['web']], function () {

    Route::get('/welcome','UserController@check');
    Route::get('/statistics','UserController@showstats');
    
    //Routes for Users

    Route::post('/signin','UserController@store');
    Route::get ('/signin','UserController@create');
    Route::get ('/login','UserController@index');
    Route::get('/password_reset','UserController@passwordResetShow');
    Route::get('/password_reset/reset','UserController@passwordReset');
    
    //Routes for Categories

    Route::get('/categories/AddCateogries','CategorieController@show');
    Route::post('/categories/AddCateogries/add','CategorieController@store');
    Route::get('/categories/DeletedCateogries','CategorieController@index2');
    Route::get('/categories/ShowCateogries','CategorieController@index');
    Route::post('/updatecategories','CategorieController@update');
    Route::delete('/updatecategories/delete','CategorieController@destroy');
    Route::delete('/updatecategories/restore','CategorieController@restore');
    Route::get('/updatecategories','CategorieController@edit');
    Route::get('/categorieSearch/avaliableCategories','CategorieController@search_available');
    Route::get('/categorieSearch/unavaliableCategories','CategorieController@search_unavailable');

    //Routes for Brandes

    Route::get('/brands/AddBrands','BrandController@show');
    Route::get('/brands/ShowBrands','BrandController@index');
    Route::get('/brands/DeletedBrands','BrandController@index2');
    Route::get('/updatebrands','BrandController@edit');
    Route::post('/updatebrands/update','BrandController@update');
    Route::delete('/updatebrands/delete','BrandController@destroy');
    Route::delete('/updatebrands/restore','BrandController@restore');
    Route::get('/brandSearch/avaliableBrands','BrandController@search_available');
    Route::get('/brandSearch/unavaliableBrands','BrandController@search_unavailable');
    Route::post('/brands/Addbrands/add','BrandController@store');

    //Routes for Products

    Route::get('/products/ShowProducts','ProductController@index');
    Route::get('/products/DeletedProducts','ProductController@index2');
    Route::get('/productSearch/avaliableProducts','ProductController@search_available');
    Route::get('/productSearch/unavaliableProducts','ProductController@search_unavailable');
    Route::delete('/updateProducts/delete','ProductController@destroy');
    Route::delete('/updateProducts/restore','ProductController@restore');
    Route::get('/products/Addproducts','ProductController@create');
    Route::post('/products/AddProducts/add','ProductController@store');
    Route::get('/updateproducts','ProductController@edit');
    Route::post('/updateproducts','ProductController@update');

    //Routes for Emails

    Route::get('/email','SendEmailController@index');
    Route::post('/email/send','SendEmailController@send');
    Route::get('/email/sended','SendEmailController@sended');
    Route::get('/email/received','SendEmailController@received');
    Route::delete('/email/deleted1','SendEmailController@deletedSended');
    Route::delete('/email/deleted2','SendEmailController@deletedReceived');
    Route::get('/email/deleted','SendEmailController@trash');
    Route::post('/email/restore','SendEmailController@restore');
    Route::get('/email/search_sendedemail','SendEmailController@find_sended');
    Route::get('/email/search_receivedemail','SendEmailController@find_received');
    Route::get('/email/search_trash','SendEmailController@find_trash');
    
    //Routes for Categallery

    Route::get('/gallery','GalleryController@show');
    Route::get('/gallery/addCategoriesPhotos','GalleryController@showCateAdd');
    Route::post('/gallery/addCategoriesPhotos/add','GalleryController@storeCateImg');
    Route::get('/gallery/showCategoriesPhotos','GalleryController@showCatePhoto');
    Route::get('/gallery/updateCategoriesPhotos/update','GalleryController@editCateImg');
    Route::post('/gallery/updateCategoriesPhotos/update2','GalleryController@updateCateImg');
    Route::get('/gallery/updateCategoriesPhotos/delete','GalleryController@destroy');
    Route::get('/gallery/deletedCategoriesPhotos','GalleryController@showCatePhoto2');
    Route::get('/gallery/deletedCategoriesPhotos/delete','GalleryController@restoreCateImg');
    
    //Routes for Brandgallery

    Route::get('/gallery','GalleryController@show');
    Route::get('/gallery/addBrandsPhotos','Media_brands_Controller@showBrandAdd');
    Route::post('/gallery/addBrandsPhotos/add','Media_brands_Controller@storeBrandImg');
    Route::get('/gallery/showBrandsPhotos','Media_brands_Controller@showBrandPhoto');
    Route::get('/gallery/updateBrandsPhotos/update','Media_brands_Controller@editBrandImg');
    Route::post('/gallery/updateBrandsPhotos/update2','Media_brands_Controller@updateBrandImg');
    Route::get('/gallery/updateBrandsPhotos/delete','Media_brands_Controller@destroy');
    Route::get('/gallery/deletedBrandsPhotos','Media_brands_Controller@showBrandPhoto2');
    Route::get('/gallery/deletedBrandsPhotos/delete','Media_brands_Controller@restoreBrandImg');

    //Routes for Productgallery

    Route::get('/gallery','GalleryController@show');
    Route::get('/gallery/addProductsPhotos','Media_productController@showProductAdd');
    Route::post('/gallery/addProductsPhotos/add','Media_productController@storeProductImg');
    Route::get('/gallery/showProductsPhotos','Media_productController@showProductPhoto');
    Route::get('/gallery/updateProductsPhotos/update','Media_productController@editProductImg');
    Route::post('/gallery/updateProductsPhotos/update2','Media_productController@updateProductImg');
    Route::get('/gallery/updateProductsPhotos/delete','Media_productController@destroy');
    Route::get('/gallery/deletedProductsPhotos','Media_productController@showProductPhoto2');
    Route::get('/gallery/deletedProductsPhotos/delete','Media_productController@restoreProductImg');

    //Routes for Users

    Route::get('/users','UserController@index3');
    Route::get('/users/ShowUsers','UserController@showUsers');
    Route::get('/users/DeletedUsers','UserController@showDeletedUsers');
    Route::get('/users/updateUsers','UserController@editUsers');
    Route::post('/users/updateUsers/update','UserController@updateUser');
    Route::get('/users/AddUsers','UserController@addUserShow');
    Route::post('/users/AddUsers/add','UserController@storeUser');
    Route::get('/users/updateUsers/deleted','UserController@deletedUser');
    Route::get('/users/updateUsers/restore','UserController@restoreUser');
    Route::get('/userSearch/activeUsers','UserController@search_available');
    Route::get('/userSearch/unactiveUsers','UserController@search_unavailable');
    Route::get('/user/userProfile','UserController@userProfile');
    

    //Routes for hayah food Ar
    Route::get('/','Hayah_Food_Controller@index');
    Route::view('/aboutus','hayah_food.ar.aboutus');
    Route::get('/contactus','Hayah_Food_Controller@contactus');
    Route::post('/contactus/send','Hayah_Food_Controller@contactus_send');
    Route::get('/products','Hayah_Food_Controller@products_page');
    Route::get('/details','Hayah_Food_Controller@products_details_page');
    Route::get('/media','Hayah_Food_Controller@media');


    //Routes for hayah food En
    Route::get('/en','Hayah_Food_EnController@index_en');
    Route::view('/aboutus/en','hayah_food.en.aboutus');
    Route::get('/products/en','Hayah_Food_EnController@products_page');
    Route::get('/details/en','Hayah_Food_EnController@products_details_page');
    Route::get('/media/en','Hayah_Food_EnController@media');
    Route::get('/contactus/en','Hayah_Food_EnController@contactus');
    Route::post('/contactus/send/en','Hayah_Food_EnController@contactus_send');


    Route::get('/test',function(){
        return view('test');
    });
   
});

    





