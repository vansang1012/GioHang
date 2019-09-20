0               <?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('product', 'ProductController@index')->name('product.index');
Route::get('cart/{id}','CardController@add')->name('cart.add');
Route::get('list', 'CardController@index')->name('cart.index');
Route::get('delete', 'CardController@remove')->name('cart.delete');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
