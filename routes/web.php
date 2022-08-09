<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;

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
// Route::get('/','UserController@pizzaList')->name('user#pizzaList');
Route::get('/','UserController@index')->name('user#index');

// Route::get('/', function () {
//     return view('user.home');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->get('/dashboard',function () {

    if(Auth::check()){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('admin#profile');
        }else if(Auth::user()->role == 'user'){
            return redirect()->route('user#index');
        }
    }
});




Route::group(['prefix' => 'admin','middleware' => [AdminMiddleware::class]],function(){
    Route::get('/','AdminController@profile')->name('admin#profile');

    // CRUD category
    Route::get('category','CategoryController@category')->name('admin#category'); // list
    Route::get('addCategory','CategoryController@addCategory')->name('admin#addCategory');
    Route::post('createCategory','CategoryController@createCategory')->name('admin#createCategory');
    Route::get('deleteCategory/{id}','CategoryController@deleteCategory')->name('admin#deleteCategory');
    Route::get('editCategory/{id}','CategoryController@editCategory')->name('admin#editCategory');
    Route::post('updateCategory','CategoryController@updateCategory')->name('admin#updateCategory');
    Route::post('category','CategoryController@searchCategory')->name('admin#searchCategory');
    Route::get('categoryItem/{id}','CategoryController@categoryItem')->name('admin#categoryItem');

    // CRUD Pizza
    Route::get('showPizza','PizzaController@showPizza')->name('admin#showPizza');
    Route::get('createPizza','PizzaController@createPizza')->name('admin#createPizza');
    Route::post('addPizza','PizzaController@addPizza')->name('admin#addPizza');
    Route::get('detailPizza/{id}','PizzaController@detailPizza')->name('admin#detailPizza');
    Route::get('deletePizza/{id}','PizzaController@deletePizza')->name('admin#deletePizza');
    Route::get('editPizza/{id}','PizzaController@editPizza')->name('admin#editPizza');
    Route::post('updatePizza/{id}','PizzaController@updatePizza')->name('admin#updatePizza');
    Route::post('showPizza','PizzaController@searchPizza')->name('admin#searchPizza');


    //user
    Route::get('userList','AdminController@userList')->name('admin#userList');
    Route::post('userSearch','AdminController@userSearch')->name('admin#userSearch');
    Route::get('adminList','AdminController@adminList')->name('admin#adminList');
    Route::post('adminSearch','AdminController@adminSearch')->name('admin#adminSearch');
    Route::get('userDelete/{id}','AdminController@userDelete')->name('admin#userDelete');
    Route::get('deleteAdmin/{id}','AdminController@deleteAdmin')->name('admin#deleteAdmin');



});
Route::group(['prefix' => 'user'],function(){
    Route::get('/home','UserController@pizzaList')->name('user#pizzaList');
    Route::get('filterCategory','UserController@filterCategory')->name('user#filterCategory');
    Route::get('searchWithCategory/{id}','UserController@searchWithCategory')->name('user#searchWithCategory');
    Route::get('shoppingCart','UserController@shoppingCart')->name('user#shoppingCart');

});
// Route::group(['prefix' => 'user','middleware' => [UserMiddleware::class]],function(){




// });
Route::post('order','UserController@userOrder');
