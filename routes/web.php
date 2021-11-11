<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can people web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('\App\Http\Controllers\Site')->group(function(){
    Route::get('/', 'LoginController@index')->name('site.login');
    Route::get('/cadastro', 'PeopleController@index')->name('site.people');
    Route::post('/cadastro', 'PeopleController@form')->name('site.people.form');
    Route::post('reset', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.form');
    Route::get('reset/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('site.reset');

    Route::prefix('login')->group(function (){

        Route::post('', 'LoginController@authenticate')->name('site.login.form');
        Route::get('/forgot', 'LoginController@forgot')->name('site.login.forgot');
        Route::get('/logout', 'LoginController@logout')->name('site.login.logout');
        Route::post('/forgot', 'ForgotPasswordController@forgetPasswordForm')->name('site.forgot.form');

        Route::get('/{provider}', 'LoginController@redirectToProvider')->name('social.login');
        Route::get('/{provider}/callback', 'LoginController@handleProviderCallback')->name('social.callback');

    });

    Route::middleware('user')->group(function (){
    //    Auth::routes();
        Route::get('home', HomeController::class)->name('site.home');

        Route::get('produtos', 'CategoryController@index')->name('site.products');
        Route::get('produtos/{slug}', 'CategoryController@show')->name('site.products.category');

        Route::get('blog', 'BlogController@invoke')->name('site.blog');

        Route::view('sobre', 'site.about.index')->name('site.about');

        Route::get('contato', 'ContactController@index')->name('site.contact');
        Route::post('contato', 'ContactController@form')->name('site.contact.form');

        Route::prefix('cadastro')->group(function (){

            Route::get('/dados-fisicos/{people}', 'PeopleController@physicalPerson')->name('site.physicalPeople');
            Route::post('/dados-fisicos', 'PeopleController@physicalPersonForm')->name('site.physicalPeople.form');
            Route::get('/dados-juridicos/{people}', 'PeopleController@legalPerson')->name('site.legalPeople');
            Route::post('/dados-juridicos', 'PeopleController@legalPersonForm')->name('site.legalPeople.form');

        });

        Route::prefix('pedido')->group(function (){

            Route::get('/cadastro', 'OrderController@create')->name('site.order.create');
            Route::post('/cadastro', 'OrderController@register')->name('site.order.people');
            Route::get('/editar/{order}', 'OrderController@edit')->name('site.order.edit');
            Route::get('/visualizar/{order}', 'OrderController@show')->name('site.order.show');
            Route::put('/delete', 'OrderController@softDelete')->name('site.order.update');

            Route::get('/busca', 'OrderController@index')->name('site.order');
            Route::get('/buscas', 'OrderController@search')->name('site.order.search');

        });

    });
});



Route::middleware('admin')->group(function (){
    Route::get('admin', function (){
        dd('SOU ADMIN E NÃO NEGO');
    });
});

Route::middleware('partner')->group(function (){
    Route::get('partner', function (){
        dd('SOU PARCERO MERMAUM');
    });
});
