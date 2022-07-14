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

// Route::get('/', function () {
//     return view('welcome');
// });

// Start Front End routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'Auth\LoginController@showlogin')->name('login');
// End Front End routes
Auth::routes();


Route::get('/home', 'HomeController@index')->name('home');
Route::post('/userlogin', 'Auth\LoginController@login');
Route::post('/userRegister', 'Auth\RegisterController@save');
Route::get('/verification', 'Auth\RegisterController@verification');
Route::get('/forgot-password','Auth\ResetPasswordController@forgot');
Route::post('/forgotPassword','Auth\ResetPasswordController@forgotPassword');
Route::get('/forgotPassword-verifiy','Auth\ResetPasswordController@verify');
Route::post('/newPasswordUpdate','Auth\ResetPasswordController@newPasswordUpdate');
Route::get('/contact-us','ContactController@index');
Route::post('/contactSave','ContactController@contactSave');
Route::get('/about-us','ContactController@about');
Route::get('/faqs','ContactController@faq');
Route::get('/term-conditions','ContactController@term');
Route::get('/privacy-policy','ContactController@privacy');
Route::get('/refund-policy','ContactController@privacy');

Route::group(['middleware' => ['auth','agent']], function () {
  Route::get('/profile','ProfileController@index');
  Route::get('/edit-profile','ProfileController@edit');
  Route::post('/profileUpdate','ProfileController@update');
  Route::post('/getState','ProfileController@getState');
  Route::post('/getCity','ProfileController@getCity');
  Route::get('/partner-profile','ProfileController@partnerProfile');
  Route::get('/contact-details','ProfileController@contactdetails');
  Route::post('/contactDetailUpdate','ProfileController@contactDetailUpdate');
  Route::post('/partnerPreferenceUpdate','ProfileController@partnerPreferenceUpdate');
  Route::get('/listing','ListingController@index');
  Route::post('/deleteImages','ProfileController@deleteImages');
  Route::get('/user-profile/{id}','ProfileController@userProfile');
  Route::get('/notification','ProfileController@notification');
  Route::post('/notificationUpdate','ProfileController@notificationUpdate');
  Route::get('/online', 'ProfileController@online');
  Route::post('/inviteSend', 'ProfileController@inviteSend');
  Route::get('/membership','MembershipController@index');
  Route::get('payment/{id}', 'PayuMoneyController@redirectToPayU');
  // Route::get('payment/{id}', 'MembershipController@stripe');
  Route::post('stripe', 'MembershipController@stripePost')->name('stripe.post');
  Route::get('success', 'MembershipController@success');
  Route::post('ApplyCoupon', 'MembershipController@ApplyCoupon');

  // message
  Route::get('/message','MessageController@index');
  Route::post('/getlatesthistory','MessageController@chatHistory');
  Route::post('/getoldMessage','MessageController@getoldMessage');
  Route::post('/gettime','MessageController@gettime');
  Route::post('/saveChat','MessageController@saveChat');
  Route::post('/CreateChatRoom','MessageController@CreateChatRoom');
  Route::post('/readmessage','MessageController@readmessage');
  // message

  Route::post('/checkPackage','MembershipController@checkPackage');
  Route::get('/change-password','ProfileController@changePassword');
  Route::post('/changePasswordSubmit','ProfileController@changePasswordSubmit');
});


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
        Route::get('userlist', 'UserController@index');
        Route::post('sendCoupon', 'UserController@sendCoupon');
        Route::post('ownerStatusUpdate', 'UserController@status');
        Route::get('packages','PackageController@index');
        Route::get('packages-add','PackageController@add');
        Route::post('packagesSave','PackageController@save');
        Route::get('packages-edit/{id}','PackageController@edit');
        Route::post('packages-update','PackageController@update');
        Route::post('packages-delete','PackageController@delete');

        Route::get('coupon','CouponController@index');
        Route::get('coupon-add','CouponController@add');
        Route::post('couponSave','CouponController@save');
        Route::get('coupon-edit/{id}','CouponController@edit');
        Route::post('coupon-update','CouponController@update');
        Route::post('coupon-delete','CouponController@delete');

        Route::get('country','CountryController@index');
        Route::get('country-add','CountryController@add');
        Route::post('countrySave','CountryController@save');
        Route::get('country-edit/{id}','CountryController@edit');
        Route::post('country-update','CountryController@update');
        Route::post('country-delete','CountryController@delete');

        Route::get('categories','CategoriesController@index');
        Route::get('categories-add','CategoriesController@add');
        Route::post('categoriesSave','CategoriesController@save');
        Route::get('categories-edit/{id}','CategoriesController@edit');
        Route::post('categories-update','CategoriesController@update');
        Route::post('categories-delete','CategoriesController@delete');

        Route::get('state','StateController@index');
        Route::get('state-add/{id}','StateController@add');
        Route::post('stateSave','StateController@save');
        Route::get('state-edit/{id}','StateController@edit');
        Route::post('state-update','StateController@update');
        Route::post('state-delete','StateController@delete');

        Route::get('city','CityController@index');
        Route::get('city-add/{id}','CityController@add');
        Route::post('citySave','CityController@save');
        Route::get('city-edit/{id}','CityController@edit');
        Route::post('city-update','CityController@update');
        Route::post('city-delete','CityController@delete');

        Route::get('stories','StoriesController@index');
        Route::get('stories-add','StoriesController@add');
        Route::post('storiesSave','StoriesController@save');
        Route::get('stories-edit/{id}','StoriesController@edit');
        Route::post('stories-update','StoriesController@update');
        Route::post('stories-delete','StoriesController@delete');

        Route::get('community','CommunityController@index');
        Route::get('community-add','CommunityController@add');
        Route::post('communitySave','CommunityController@save');
        Route::get('community-edit/{id}','CommunityController@edit');
        Route::post('community-update','CommunityController@update');
        Route::post('community-delete','CommunityController@delete');

        Route::get('mothertongue','MotherTongueController@index');
        Route::get('mothertongue-add','MotherTongueController@add');
        Route::post('mothertongueSave','MotherTongueController@save');
        Route::get('mothertongue-edit/{id}','MotherTongueController@edit');
        Route::post('mothertongue-update','MotherTongueController@update');
        Route::post('mothertongue-delete','MotherTongueController@delete');

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

    });
  });
// ******************************Admin routes**********
