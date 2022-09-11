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


// Start Front End routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showlogin')->name('login');
// End Front End routes
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/healthcare', 'HomeController@healthcare')->name('healthcare');
Route::get('/about-us','ContactController@about');
Route::get('/infrastructure','HomeController@infrastructure');
Route::get('/download','HomeController@download');

Route::get('/export','HomeController@export');
Route::get('/media-center','ContactController@mediaCenter');
Route::get('/testimonials','ContactController@testimonials');
Route::get('/careers','ContactController@careers');
Route::get('/products','ProductsController@index');
Route::get('/inspiration','HomeController@insipirations');
Route::get('/resource','HomeController@resource');
Route::get('/visualizers','HomeController@visualizers');
Route::get('/investors','HomeController@investors');
Route::get('/where-to-buy','HomeController@whereToBuy');
Route::get('/blog','HomeController@blog');
Route::get('/contact-us','ContactController@index')->name('contact.us.index');
Route::post('/contactSave','ContactController@contactSave');

Route::post('/send-contact-us','ContactController@sendContactUs')->name('send.contact.us');
Route::post('/send-career','ContactController@sendCarrier')->name('send.career');




// ******************************Website routes**********
// ******************************Admin routes**********
// Admin Routes
Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login', 'AdminController@loginView')->name('admin.login');
    Route::post('login', 'AdminController@loginAuthenticate');
    Route::get('forgot-password', 'AdminController@forgotPasswordView');
    Route::post('forgot-password', 'AdminController@forgotPassword');
    Route::get('reset-password/{token}', 'AdminController@resetPasswordView');
    Route::post('reset-password', 'AdminController@resetPassword');
    Route::get('logout', function () {
        \Auth::logout();

        return redirect('admin/login');
    });
    Route::group(['middleware' => ['auth', 'admin']], function () {


        Route::get('dashboard', 'DashboardController@DashboardView');
        Route::get('home', 'DashboardController@home');
        Route::post('homeSave', 'DashboardController@homeSave');



        Route::get('categories','CategoriesController@index');
        Route::get('categories-add','CategoriesController@add');
        Route::post('categoriesSave','CategoriesController@save');
        Route::get('categories-edit/{id}','CategoriesController@edit');
        Route::post('categories-update','CategoriesController@update');
        Route::post('categories-delete','CategoriesController@delete');



        Route::get('testimonials','TestimonialsController@index');
        Route::get('testimonials-add','TestimonialsController@add');
        Route::post('testimonialsSave','TestimonialsController@save');
        Route::get('testimonials-edit/{id}','TestimonialsController@edit');
        Route::post('testimonials-update','TestimonialsController@update');
        Route::post('testimonials-delete','TestimonialsController@delete');




        Route::get('qualification','QualificationController@index');
        Route::get('qualification-add','QualificationController@add');
        Route::post('qualificationSave','QualificationController@save');
        Route::get('qualification-edit/{id}','QualificationController@edit');
        Route::post('qualification-update','QualificationController@update');
        Route::post('qualification-delete','QualificationController@delete');

        Route::get('workingsectors','WorkingSectorsController@index');
        Route::get('workingsectors-add','WorkingSectorsController@add');
        Route::post('workingsectorsSave','WorkingSectorsController@save');
        Route::get('workingsectors-edit/{id}','WorkingSectorsController@edit');
        Route::post('workingsectors-update','WorkingSectorsController@update');
        Route::post('workingsectors-delete','WorkingSectorsController@delete');

        Route::get('payments','PaymentsController@index');

        Route::get('/password', 'DashboardController@password');
        Route::post('/passwordUpdate', 'DashboardController@passwordUpdate');

        Route::get('settings','SettingsController@index')->name("settings.index");
        Route::post('settings-save','SettingsController@save')->name("settings.save");

        Route::get('investors','InvestorsController@index')->name("investor.index");
        Route::get('investor-add','InvestorsController@add')->name("investor.add");
        Route::post('investor-save','InvestorsController@save')->name("investor.save");
        Route::get('investor-edit/{id}','InvestorsController@edit')->name("investor.edit");
        Route::post('investor-update','InvestorsController@update')->name("investor.update");
        Route::post('investor-delete','InvestorsController@delete')->name("investor.delete");

        Route::get('media','MediaController@index')->name("media.index");
        Route::get('media-add','MediaController@add')->name("media.add");
        Route::post('media-save','MediaController@save')->name("media.save");
        Route::get('media-edit/{id}','MediaController@edit')->name("media.edit");
        Route::post('media-update','MediaController@update')->name("media.update");
        Route::post('media-delete','MediaController@delete')->name("media.delete");

        Route::get('product','ProductsController@index')->name("product.index");
        Route::get('product-add','ProductsController@add')->name("product.add");
        Route::post('product-save','ProductsController@save')->name("product.save");
        Route::get('product-edit/{id}','ProductsController@edit')->name("product.edit");
        Route::post('product-update','ProductsController@update')->name("product.update");
        Route::post('product-delete','ProductsController@delete')->name("product.delete");

        Route::get('gallary','GallaryController@index')->name("gallary.index");
        Route::get('gallary-add','GallaryController@add')->name("gallary.add");
        Route::post('gallary-save','GallaryController@save')->name("gallary.save");
        Route::get('gallary-edit/{id}','GallaryController@edit')->name("gallary.edit");
        Route::post('gallary-update','GallaryController@update')->name("gallary.update");
        Route::post('gallary-delete','GallaryController@delete')->name("gallary.delete");

        Route::get('career','CareerController@index')->name("career.index");
        Route::get('career-add','CareerController@add')->name("career.add");
        Route::post('career-save','CareerController@save')->name("career.save");
        Route::get('career-edit/{id}','CareerController@edit')->name("career.edit");
        Route::post('career-update','CareerController@update')->name("career.update");
        Route::post('career-delete','CareerController@delete')->name("career.delete");

        Route::get('certification','CertificationController@index')->name("certification.index");
        Route::get('certification-add','CertificationController@add')->name("certification.add");
        Route::post('certification-save','CertificationController@save')->name("certification.save");
        Route::get('certification-edit/{id}','CertificationController@edit')->name("certification.edit");
        Route::post('certification-update','CertificationController@update')->name("certification.update");
        Route::post('certification-delete','CertificationController@delete')->name("certification.delete");

        Route::get('filter','FilterController@index')->name("filter.index");
        Route::get('filter-add','FilterController@add')->name("filter.add");
        Route::post('filter-save','FilterController@save')->name("filter.save");
        Route::get('filter-edit/{id}','FilterController@edit')->name("filter.edit");
        Route::post('filter-update','FilterController@update')->name("filter.update");
        Route::post('filter-delete','FilterController@delete')->name("filter.delete");

        Route::get('meta','MetaController@index')->name("meta.index");
        Route::get('meta-add','MetaController@add')->name("meta.add");
        Route::post('meta-save','MetaController@save')->name("meta.save");
        Route::get('meta-edit/{id}','MetaController@edit')->name("meta.edit");
        Route::post('meta-update','MetaController@update')->name("meta.update");
        Route::post('meta-delete','MetaController@delete')->name("meta.delete");

        Route::get('commitee','CommiteeController@index')->name("commitee.index");
        Route::get('commitee-add','CommiteeController@add')->name("commitee.add");
        Route::post('commitee-save','CommiteeController@save')->name("commitee.save");
        Route::get('commitee-edit/{id}','CommiteeController@edit')->name("commitee.edit");
        Route::post('commitee-update','CommiteeController@update')->name("commitee.update");
        Route::post('commitee-delete','CommiteeController@delete')->name("commitee.delete");

        Route::get('resources','ResourcesController@index')->name("resources.index");
        Route::get('resources-add','ResourcesController@add')->name("resources.add");
        Route::post('resources-save','ResourcesController@save')->name("resources.save");
        Route::get('resources-edit/{id}','ResourcesController@edit')->name("resources.edit");
        Route::post('resources-update','ResourcesController@update')->name("resources.update");
        Route::post('resources-delete','ResourcesController@delete')->name("resources.delete");
        Route::post('resources-delete-attachment','ResourcesController@resourcesDeleteAttachment')->name("resources.delete.attachment");

        Route::get('page','PageController@index')->name("page.index");
        Route::get('page-add','PageController@add')->name("page.add");
        Route::post('page-save','PageController@save')->name("page.save");
        Route::get('page-edit/{id}','PageController@edit')->name("page.edit");
        Route::post('page-update','PageController@update')->name("page.update");
        Route::post('page-delete','PageController@delete')->name("page.delete");

        Route::get('blog','BlogController@index')->name("blog.index");
        Route::get('blog-add','BlogController@add')->name("blog.add");
        Route::post('blog-save','BlogController@save')->name("blog.save");
        Route::get('blog-edit/{id}','BlogController@edit')->name("blog.edit");
        Route::post('blog-update','BlogController@update')->name("blog.update");
        Route::post('blog-delete','BlogController@delete')->name("blog.delete");
    });
  });
// ******************************Admin routes**********
