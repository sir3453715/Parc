<?php

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



Route::group(['middleware' => 'web', 'prefix' => 'backend'], function () {
    Route::auth();
    Route::group(['middleware' => 'auth', 'namespace' => 'Backend'], function () {
        // 後台相關Route請設置在這裡，否則身分認證會失效
        Route::get('/', ['as' => 'backend.index', 'uses' => 'IndexController@index']);

        Route::post('/logout', function() {
            Auth::logout();
            return redirect('/backend');
        });

        Route::get('/Password', 'PasswordController@index');
        Route::post('/Password', 'PasswordController@update');

        Route::get('/Usergroups', 'UsergroupsController@index');
        Route::get('/Usergroups/create', 'UsergroupsController@create');
        Route::get('/Usergroups/edit/{id}', 'UsergroupsController@edit');
        Route::post('/Usergroups/store', 'UsergroupsController@store');
        Route::delete('/Usergroups/{id}', 'UsergroupsController@delete');

        Route::get('/Users', 'UsersController@index');
        Route::get('/Users/edit/{id}', 'UsersController@edit');
        Route::get('/Users/create', 'UsersController@create');
        Route::post('/Users/store', 'UsersController@store');
        Route::delete('/Users/{id}', 'UsersController@delete');

        Route::get('/Funmenus', 'FunmenusController@index');
        Route::get('/Funmenus/create', 'FunmenusController@create');
        Route::get('/Funmenus/edit/{id}', 'FunmenusController@edit');
        Route::post('/Funmenus/store', 'FunmenusController@store');
        Route::delete('/Funmenus/delete/{id}', 'FunmenusController@delete');

        Route::get('/Funmenus/{menuid}', 'FunmenusDetailController@index');
        Route::get('/Funmenus/{menuid}/create', 'FunmenusDetailController@create');
        Route::get('/Funmenus/{menuid}/edit/{id}', 'FunmenusDetailController@edit');
        Route::post('/Funmenus/{menuid}/store', 'FunmenusDetailController@store');
        Route::delete('/Funmenus/{menuid}/delete/{id}', 'FunmenusDetailController@delete');

        Route::get('/article', 'ArticleController@index');
        Route::post('/article', 'ArticleController@index');
        Route::get('/article/create', 'ArticleController@create');
        Route::post('/article/create', 'ArticleController@store');
        Route::get('/article/create/ajax/{category_id}','ArticleController@sub_menu_ajax');
        Route::get('/article/create/ajax/{category_id}/{sub_category_id}','ArticleController@extra_sub_menu_ajax');
        Route::get('/article/edit/{article}', 'ArticleController@edit');
        Route::post('/article/edit/{article}', 'ArticleController@update');
        Route::delete('/article/delete/{article}', 'ArticleController@destroy');
        Route::delete('/article/delete_selected', 'ArticleController@delete_selected');

        Route::get('/category', 'CategoryController@index');
        Route::post('/category', 'CategoryController@index');
        Route::get('/category/create', 'CategoryController@create');
        Route::post('/category/create', 'CategoryController@store');
        Route::get('/category/category/edit/{category}', 'CategoryController@editCategory');
        Route::post('/category/category/edit/{category}', 'CategoryController@updateCategory');
        Route::get('/category/sub_category/edit/{sub_category}', 'CategoryController@editSubCategory');
        Route::post('/category/sub_category/edit/{sub_category}', 'CategoryController@updateSubCategory');
        Route::get('/category/extra_sub_category/edit/{extra_sub_category}', 'CategoryController@editExtraSubCategory');
        Route::post('/category/extra_sub_category/edit/{extra_sub_category}', 'CategoryController@updateExtraSubCategory');
        Route::delete('/category/category/delete/{category}', 'CategoryController@destroyCategory');
        Route::delete('/category/sub_category/delete/{sub_category}', 'CategoryController@destroySubCategory');
        Route::delete('/category/extra_sub_category/delete/{extra_sub_category}', 'CategoryController@destroyextraSubCategory');
        Route::delete('/category/delete_selected', 'CategoryController@delete_selected');


        Route::get('/lecturer','LecturerController@index');
        Route::get('/lecturer/create','LecturerController@create');
        Route::post('/lecturer/create','LecturerController@store');
        Route::get('/lecturer/edit/{lecturer}','LecturerController@edit');
        Route::post('/lecturer/edit/{lecturer}','LecturerController@update');
        Route::get('/lecturer/order','LecturerController@order');
        Route::post('/lecturer/order','LecturerController@order_update');
        Route::delete('/lecturer/delete/{lecturer}','LecturerController@destroy');

        Route::get('/contact_form','ContactFormController@index');
        Route::get('/contact_form/create','ContactFormController@create');
        Route::get('/contact_form/edit/{contact_form}','ContactFormController@edit');
        Route::post('/contact_form/edit/{contact_form}','ContactFormController@update');
        Route::post('/contact_form/create','ContactFormController@store');
        Route::delete('/contact_form/delete/{contact_form}','ContactFormController@destroy');

        Route::get('/milestone','MileStoneController@index');
        Route::get('/milestone/create','MileStoneController@create');
        Route::post('/milestone/create','MileStoneController@store');
        Route::get('/milestone/edit/{milestone}','MileStoneController@edit');
        Route::post('/milestone/edit/{milestone}','MileStoneController@update');
        Route::get('/milestone/order','MileStoneController@order');
        Route::post('/milestone/order','MileStoneController@order_update');
        Route::delete('/milestone/delete/{milestone}','MileStoneController@destroy');

        Route::get('/faq','FaqController@index');
        Route::get('/faq/create','FaqController@create');
        Route::get('/faq/edit/{faq}','FaqController@edit');
        Route::post('/faq/edit/{faq}','FaqController@update');
        Route::post('/faq/create','FaqController@store');
        Route::get('/faq/order','FaqController@order');
        Route::post('/faq/order','FaqController@orderUpdate');
        Route::delete('/faq/delete/{faq}','FaqController@destroy');

        Route::get('/donate','DonateController@index');
        Route::post('/donate','DonateController@index');
        Route::get('/donate/create','DonateController@create');
        Route::post('/donate/create','DonateController@store');
        Route::delete('/donate/delete/{donate}','DonateController@destroy');

        Route::get('/partner','PartnerController@index');
        Route::get('/partner/create','PartnerController@create');
        Route::get('/partner/edit/{partner}','PartnerController@edit');
        Route::post('/partner/edit/{partner}','PartnerController@update');
        Route::post('/partner/create','PartnerController@store');
        Route::get('/partner/order','PartnerController@order');
        Route::post('/partner/order','PartnerController@orderUpdate');
        Route::delete('/partner/delete/{partner}','PartnerController@destroy');
        
    });
});