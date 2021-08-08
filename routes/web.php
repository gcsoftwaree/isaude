<?php

use Illuminate\Support\Facades\Auth;
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

Route::namespace('\App\Http\Controllers\Site')->group(function(){
    Route::get('/', 'LoginController@index')->name('site.login');
//    Auth::routes();
    Route::post('login', 'LoginController@authenticate')->name('site.login.form');
    Route::get('login/forgot', 'LoginController@forgot')->name('site.login.forgot');
    Route::get('login/logout', 'LoginController@logout')->name('site.login.logout');

    Route::get('home', HomeController::class)->name('site.home');

    Route::get('produtos', 'CategoryController@index')->name('site.products');

    Route::get('produtos/{slug}', 'CategoryController@show')->name('site.products.category');

    Route::get('blog', 'BlogController@invoke')->name('site.blog');

    Route::view('sobre', 'site.about.index')->name('site.about');

    Route::get('contato', 'ContactController@index')->name('site.contact');
    Route::post('contato', 'ContactController@form')->name('site.contact.form');

    Route::get('cadastro', 'RegisterController@index')->name('site.register');
    Route::post('cadastro', 'RegisterController@form')->name('site.register.form');

    Route::post('login/forgot', 'ForgotPasswordController@forgetPasswordForm')->name('site.forgot.form');
    Route::get('reset/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('site.reset');
    Route::post('reset', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.form');

    Route::get('login/{provider}', 'LoginController@redirectToProvider')->name('social.login');
    Route::get('login/{provider}/callback', 'LoginController@handleProviderCallback')->name('social.callback');

    Route::get('pedido/cadastro', 'OrderController@create')->name('site.order.create');
    Route::post('pedido/cadastro', 'OrderController@register')->name('site.order.register');

    Route::get('pedido/busca', 'OrderController@index')->name('site.order');
    Route::get('pedido/buscas', 'OrderController@search')->name('site.order.search');
});

