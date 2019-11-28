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

    //前台專區
Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/' , 'IndexController@index');
    Route::get('/story/{type?}' , 'IndexController@storyIndex');
    Route::get('/{category}/{sub_category}/article/{id}' , 'ArticleController@getArticleDetail');
    
    Route::get('/love/{type?}' , 'IndexController@loveIndex');
    Route::get('/love/love-course/{type?}' , 'IndexController@loveIndex');

    Route::get('/event' , 'IndexController@eventIndex');
    Route::get('/event/course/{type?}' , 'IndexController@eventCourseIndex');
    Route::get('/event/lecturer/' , 'IndexController@eventLecturerIndex');
    Route::post('/event/lecturer/' , 'IndexController@eventLecturerPost');
    Route::get('/event/video/{type?}' , 'IndexController@eventVideoIndex');
    Route::get('/event/lohas/{type?}' , 'IndexController@eventLohasIndex');

    Route::get('/law/policy/{type?}' , 'IndexController@lawPolicyIndex');
    Route::get('/law' , 'IndexController@lawIndex');
    Route::get('/law/act/{type?}' , 'IndexController@lawActIndex');
    Route::get('/law/policy/' , 'IndexController@lawPolicyIndex');

    Route::get('/trend' , 'IndexController@trendIndex');
    Route::get('/trend/international' , 'IndexController@trendInternationalIndex');
    Route::get('/trend/exchange' , 'IndexController@trendExchangeIndex');
    Route::get('/trend/ngo' , 'IndexController@trendNgoIndex');
    Route::get('/trend/world' , 'IndexController@trendWorldIndex');

    Route::get('/news/{type?}' , 'IndexController@newsIndex');
    Route::get('/faq' , 'IndexController@faq');
    Route::get('/sitemap' , 'IndexController@sitemap');
    Route::get('/exercise', 'IndexController@exercise');
    Route::get('/sponsor', 'IndexController@sponsor');

    Route::get('/donate', 'IndexController@donate');
    Route::get('/donate/story', 'IndexController@donateStory');
    Route::get('/donate/inquiry', 'IndexController@donateInquiry');
    Route::post('/donate/inquiry', 'IndexController@donateInquiryPost');

    Route::get('/about', 'IndexController@about');
    Route::get('/about/ceo', 'IndexController@aboutCeo');
    Route::get('/about/history', 'IndexController@aboutHistory');
    Route::get('/about/organization', 'IndexController@aboutOrganization');
    
    Route::get('/tag/{tag}','IndexController@tagResult');
    // Route::view('/404', 'frontend.master.404');
    Route::view('/edm_complete', 'frontend.edm_complete');
    Route::view('/about-en','frontend.nav.about-en');
    Route::view('/search','frontend.search');
    Route::fallback(function(){
        return response()->view('frontend.master.404', [], 404);
    });
});

// Route::get('/', function () {
//     return view('index');
// });



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

        Route::get('/indexKV/kv','IndexKvController@kvIndex');
        Route::get('/indexKV/quote','IndexKvController@quoteIndex');
        Route::get('/indexKV/video','IndexKvController@video');
        Route::post('/indexKV/video','IndexKvController@videoUpdate');
        Route::get('/indexKV/kv/create','IndexKvController@create');
        Route::get('/indexKV/quote/create','IndexKvController@create');
        Route::post('/indexKV/{type}/create','IndexKvController@store');
        Route::get('/indexKV/{type}/edit/{indexKV}','IndexKvController@edit');
        Route::post('/indexKV/{type}/edit/{indexKV}','IndexKvController@update');
        Route::delete('/indexKV/delete/{indexKV}','IndexKvController@destroy');

        Route::get('/article/{category}', 'ArticleController@index');
        Route::get('/article/story/special', 'ArticleController@special');
        Route::get('/article/story/special/order', 'ArticleController@order');
        Route::post('/article/story/special/order', 'ArticleController@orderUpdate');

        Route::post('/article/{category}', 'ArticleController@index');
        Route::get('/article/{category}/create', 'ArticleController@create');
        Route::post('/article/{category}/create', 'ArticleController@store');
        Route::get('/article/create/ajax/{category_id}','ArticleController@sub_menu_ajax');
        Route::get('/article/create/ajax/{category_id}/{sub_category_id}','ArticleController@extra_sub_menu_ajax');
        Route::get('/article/{category}/edit/{article}', 'ArticleController@edit');
        Route::get('/article/news/copy/', 'ArticleController@copy_list');
        Route::post('/article/news/copy/', 'ArticleController@copy_list');
        Route::post('/article/{category}/edit/{article}', 'ArticleController@update');
        Route::delete('/article/delete/{article}', 'ArticleController@destroy');
        Route::delete('/article/delete_selected', 'ArticleController@delete_selected');
        Route::post('/article/news/copy_selected', 'ArticleController@copy_selected');

        Route::get('/category', 'CategoryController@index');
        Route::post('/category', 'CategoryController@index');
        Route::get('/category/create', 'CategoryController@create');
        Route::post('/category/create', 'CategoryController@store');
        Route::get('/category/extra_sub_category/edit/{extra_sub_category}', 'CategoryController@editExtraSubCategory');
        Route::post('/category/extra_sub_category/edit/{extra_sub_category}', 'CategoryController@updateExtraSubCategory');
        Route::delete('/category/extra_sub_category/delete/{extra_sub_category}', 'CategoryController@destroyextraSubCategory');


        Route::get('/lecturer','LecturerController@index');
        Route::post('/lecturer','LecturerController@index');
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
        
        Route::get('/about_milestone','AboutMilestoneController@index');
        Route::get('/about_milestone/create','AboutMilestoneController@create');
        Route::post('/about_milestone/create','AboutMilestoneController@store');
        Route::get('/about_milestone/edit/{about_milestone}','AboutMilestoneController@edit');
        Route::post('/about_milestone/edit/{about_milestone}','AboutMilestoneController@update');
        Route::get('/about_milestone/order','AboutMilestoneController@order');
        Route::post('/about_milestone/order','AboutMilestoneController@order_update');
        Route::delete('/about_milestone/delete/{about_milestone}','AboutMilestoneController@destroy');

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
        Route::get('/donate/edit/{donate}','DonateController@edit');
        Route::post('/donate/edit/{donate}','DonateController@update');
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