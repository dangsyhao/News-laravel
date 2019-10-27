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

  /*
  |-> Admin Group
  */
Route::middleware('auth:admin')->group(function() {

  Route::prefix('admin')->group(function() {
    //Redirect to Author Index Page
    Route::get('/', 'Admin\dashboardController@dashboard')->name('admin.dashboard');
    Route::get('/index', 'Admin\dashboardController@dashboard')->name('admin.dashboard');

/**
* Notificate items
*/
Route::get('/notifi-getNotifi', 'Admin\notifi\notificateController@notifi')->name('admin.notifi-getNotifi');
//Admin ->getAdd
Route::get('/notifi-getAdd', 'Admin\notifi\notificateController@getAdd')->name('admin.notifi-getAdd');
//Admin ->Add
Route::post('/notifi-add', 'Admin\notifi\notificateController@add')->name('admin.notifi-add');
//Admin ->getEdit
Route::get('/notifi-getEdit/{id}','Admin\notifi\notificateController@getEdit')->name('admin.notifi-getEdit');
//Admin ->Edit
Route::post('/notifi-edit', 'Admin\notifi\notificateController@edit')->name('admin.notifi-edit');
//Admin ->Edit
Route::get('/notifi-read/{id}', 'Admin\notifi\notificateController@read')->name('admin.notifi-read');
//Admin ->Delete
Route::get('/notifi-del/{id}', 'Admin\notifi\notificateController@del')->name('admin.notifi-del');

/**
* Admin items
*/
Route::get('/admin/list', 'Admin\admin\adminListController@list')->name('admin.admin-list');
//Admin ->getAdd
Route::get('/admin/list-getAdd', 'Admin\admin\adminListController@getAdd')->name('admin.admin-getAdd');
//Admin ->Add
Route::post('/admin/list-add', 'Admin\admin\adminListController@add')->name('admin.admin-add');
//Admin ->getEdit
Route::get('/admin/list-getEdit/{id}','Admin\admin\adminListController@getEdit')->name('admin.admin-getEdit');
//Admin ->Edit
Route::post('/admin/list-edit', 'Admin\admin\adminListController@edit')->name('admin.admin-edit');
//Admin ->Filter
Route::get('/admin/list-filter', 'Admin\admin\adminListController@filter')->name('admin.admin-filter');
//Admin ->Delete
Route::get('/admin/list-del/{id}', 'Admin\admin\adminListController@del')->name('admin.admin-del');

/**
* Advertise
*/
Route::get('/advertise-getAdvertise', 'Admin\advertise\advertiseController@getAdvertise')->name('admin.advertise-getAdvertise');
//Admin ->getAdd
Route::get('/advertise-getAdd', 'Admin\advertise\advertiseController@getAdd')->name('admin.advertise-getAdd');
//Admin ->Add
Route::post('/advertise-add', 'Admin\advertise\advertiseController@add')->name('admin.advertise-add');
//Admin ->getEdit
Route::get('/advertise-getEdit/{id}','Admin\advertise\advertiseController@getEdit')->name('admin.advertise-getEdit');
//Admin ->Edit
Route::post('/advertise-edit', 'Admin\advertise\advertiseController@edit')->name('admin.advertise-edit');
//Admin ->Edit
Route::get('/advertise-read/{id}', 'Admin\advertise\advertiseController@read')->name('admin.advertise-read');
//Admin ->Delete
Route::get('/advertise-del/{id}', 'Admin\advertise\advertiseController@del')->name('admin.advertise-del');

/**
* Admin ->AuthorList
*/
  Route::get('/admin/authorList', 'Admin\author\authorListController@author')->name('admin.authorList-author');
  //Admin ->getAdd
  Route::get('/admin/authorList-getAdd', 'Admin\author\authorListController@getAdd')->name('admin.authorList-getAdd');
  //Admin ->Add
  Route::post('/admin/authorList-add', 'Admin\author\authorListController@add')->name('admin.authorList-add');
  //Admin ->getEdit
  Route::get('/admin/authorList-getEdit/{id}','Admin\author\authorListController@getEdit')->name('admin.authorList-getEdit');
  //Admin ->Edit
  Route::post('/admin/authorList-edit', 'Admin\author\authorListController@edit')->name('admin.authorList-edit');
  //Admin ->Delete
  Route::get('/admin/authorList-del/{id}', 'Admin\author\authorListController@del')->name('admin.authorList-del');

  /**
   * Admin ->AuthorCategory
   */
  Route::get('/admin/authorCategory', 'admin\author\authorCategoryController@author')->name('admin.authorCategory-author');
  //Admin ->getAdd
  Route::get('/admin/authorCategory-getAdd', 'admin\author\authorCategoryController@getAdd')->name('admin.authorCategory-getAdd');
  //Admin ->Add
  Route::post('/admin/authorCategory-add', 'admin\author\authorCategoryController@add')->name('admin.authorCategory-add');
  //Admin ->getEdit
  Route::get('/admin/authorCategory-getEdit/{id}','admin\author\authorCategoryController@getEdit')->name('admin.authorCategory-getEdit');
  //Admin ->Edit
  Route::post('/admin/authorCategory-edit', 'admin\author\authorCategoryController@edit')->name('admin.authorCategory-edit');
  //Admin ->Delete
  Route::get('/admin/authorCategory-del/{id}', 'admin\author\authorCategoryController@del')->name('admin.authorCategory-del');

  /**
   * Admin ->PostList
   */
  Route::get('/post/postList', 'Admin\post\postListController@getList')->name('admin.postList-getList');
  /*******/
  Route::get('/post/postList-del/{id}', 'Admin\post\postListController@del')->name('admin.postList-del');
  /*******/
  Route::get('/post/postList-show/{id}', 'Admin\post\postListController@show')->name('admin.postList-show');
  /*******/
  Route::get('/post/postList-accept/{id}', 'Admin\post\postListController@accept')->name('admin.postList-accept');
  /*******/
  Route::get('/post/postList-accept_index/{id}', 'Admin\post\postListController@accept_index')->name('admin.postList-accept_index');
  /*******/
  Route::get('/post/postList-filter', 'Admin\post\postListController@filter')->name('admin.postList-filter');

  /**
   * Admin ->PostCategory
   */
  Route::get('/post/postCategory', 'Admin\post\postCategoryController@post')->name('admin.postCategory-post');
  /*******/
  Route::get('/post/postCategory-getAdd', 'Admin\post\postCategoryController@getAdd')->name('admin.postCategory-getAdd');
  /*******/
  Route::post('/post/postCategory-add', 'Admin\post\postCategoryController@add')->name('admin.postCategory-add');
  /*******/
  Route::get('/post/postCategory-getEdit/{id}','Admin\post\postCategoryController@getEdit')->name('admin.postCategory-getEdit');
  /*******/
  Route::post('/post/postCategory-edit', 'Admin\post\postCategoryController@edit')->name('admin.postCategory-edit');
  /*******/
  Route::get('/post/postCategory-del/{id}', 'Admin\post\postCategoryController@del')->name('admin.postCategory-del');

/**
* Admin ->Images Gallery
*/
Route::get('/imageGallery-getList', 'Admin\imageGallery\imageGalleryController@getList')->name('admin.imageGallery-getList');
//Admin ->getAdd
Route::get('/imageGallery-getAdd', 'Admin\imageGallery\imageGalleryController@getAdd')->name('admin.imageGallery-getAdd');
//Admin ->Add
Route::post('/imageGallery-add', 'Admin\imageGallery\imageGalleryController@add')->name('admin.imageGallery-add');
//Admin ->getEdit
Route::get('/imageGallery-getEdit/{id}','Admin\imageGallery\imageGalleryController@getEdit')->name('admin.imageGallery-getEdit');
//Admin ->Edit
Route::post('/imageGallery-edit', 'Admin\imageGallery\imageGalleryController@edit')->name('admin.imageGallery-edit');
//Admin ->Edit
Route::get('/imageGallery-read/{id}', 'Admin\imageGallery\imageGalleryController@read')->name('admin.imageGallery-read');
//Admin ->Delete
Route::get('/imageGallery-del/{id}', 'Admin\imageGallery\imageGalleryController@del')->name('admin.imageGallery-del');

  /**
   * Admin ->Navigation Bar
   */
  Route::get('/navBar-getNavBar', 'Admin\navBar\navBarController@getNavBar')->name('admin.navBar-getNavBar');
  //Admin ->getAdd
  Route::get('/navBar-getAdd', 'Admin\navBar\navBarController@getAdd')->name('admin.navBar-getAdd');
  //Admin ->Add
  Route::post('/navBar-add', 'Admin\navBar\navBarController@add')->name('admin.navBar-add');
  //Admin ->getEdit
  Route::get('/navBar-getEdit/{id}','Admin\navBar\navBarController@getEdit')->name('admin.navBar-getEdit');
  //Admin ->Edit
  Route::post('/navBar-edit', 'Admin\navBar\navBarController@edit')->name('admin.navBar-edit');
  //Admin ->Delete
  Route::get('/navBar-del/{id}', 'Admin\navBar\navBarController@del')->name('admin.navBar-del');

/**
* Admin ->Date
*/
    Route::get('/admin/date', 'admin\admin\adminDateController@date')->name('admin.admin.date-date');
    //Admin ->getAdd
    Route::get('/admin/date-getAdd', 'admin\admin\adminDateController@getAdd')->name('admin.admin.date-getAdd');
    //Admin ->Add
    Route::post('/admin/date-add', 'admin\admin\adminDateController@add')->name('admin.admin.date-add');
    //Admin ->getEdit
    Route::get('/admin/date-getEdit/{id}','admin\admin\adminDateController@getEdit')->name('admin.admin.date-getEdit');
    //Admin ->Edit
    Route::post('/admin/date-edit', 'admin\admin\adminDateController@edit')->name('admin.admin.date-edit');
    //Admin ->Delete
    Route::get('/admin/date-del/{id}', 'admin\admin\adminDateController@del')->name('admin.admin.date-del');
  });

    /*
    |->Admin ->Photos
    */
   Route::get('/photos-getList', 'admin\photos\photoPublicController@getList')->name('admin.photos-getList');
    /*******/
   Route::post('/photos-upload', 'admin\photos\photoPublicController@upload')->name('admin.photos-upload');
    /*******/
   Route::get('/photos-del','admin\photos\photoPublicController@del')->name('admin.photos-del');

});

 /*
  |->Admin ->Login
*/
Route::prefix('admin')->group(function() {
  
  Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
  Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

  //Register
  Route::get('/Register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.Register');
  Route::post('/Register', 'Auth\AdminRegisterController@Register')->name('admin.Register.submit');

  // Password reset routes
  Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
  //Admin Logout
  Route::get('/logout', 'Auth\AdminLogoutController@logout')->name('admin.logout');

});


/*
  |->AUTHOR Page
*/

Route::middleware('auth')->group(function() {
  // Login Author Page
  Route::prefix('author')->group(function() {

//Author->Author Dashboard
  Route::get('/','author\authorDashboardController@dashboard')->name('author.dashboard');
    //***
  Route::get('/dashboard', 'author\authorDashboardController@dashboard')->name('author.dashboard');
   //***
  Route::get('/login', 'author\authorDashboardController@dashboard')->name('author.dashboard');
  
   //Author->Notification
   //***
  Route::get('/notifi-read/{id}', 'author\authorNotificateController@read')->name('author.notifi-read');
    //***
  Route::get('/notifi-getList', 'author\authorNotificateController@getList')->name('author.notifi-getList');


  //Author->Post
  Route::get('/post-getAdd', 'Author\authorPostController@getAdd')->name('author.post-getAdd');
  //***
  Route::post('/post-add', 'Author\authorPostController@add')->name('author.post-add');
  //***
  Route::get('/post-getList', 'Author\authorPostController@getList')->name('author.post-getList');
  //***
  Route::get('/post-show/{id}', 'Author\authorPostController@show')->name('author.post-show');
  //***
  Route::post('/post-getEdit', 'Author\authorPostController@getEdit')->name('author.post-getEdit');
   //***
  Route::post('/post-edit', 'Author\authorPostController@edit')->name('author.post-edit');
  /*******/
  Route::get('/post-filter', 'Author\authorPostController@filter')->name('author.post-filter');

 
  //Author->Post Temp
  Route::get('/postTemp-getTemp', 'Author\authorPostTempController@getTemp')->name('author.postTemp-getTemp');
  //***
  Route::get('/postTemp-del/{id}', 'Author\authorPostTempController@delTemp')->name('author.postTemp-del');
  //***
  Route::get('/postTemp-update/{id}', 'Author\authorPostTempController@update')->name('author.postTemp-update');
  //***
  Route::get('/postTemp-showDemo/{id}', 'Author\authorPostTempController@showDemo')->name('author.postTemp-showDemo');
   //***
   Route::get('/postTemp-getEdit/{id}', 'Author\authorPostTempController@getEdit')->name('author.postTemp-getEdit');
    //***
  Route::post('/postTemp-edit', 'Author\authorPostTempController@edit')->name('author.postTemp-edit');

  //Author->Image
  Route::get('/imageEditor', 'Author\imageEditorController@imageEditor')->name('author.imageEditor');
 //***
  Route::post('/imageEditor-upload', 'Author\imageEditorController@upload')->name('author.imageEditor-upload');
 //***
  Route::get('/imageEditor-del','Author\imageEditorController@del')->name('author.imageEditor-del');
  }); 

 

}); 

// Auth::routes
Auth::routes();

/*
|-> Site Page
*/

Route::get('/', 'Site\homePageController@index')->name('/');
//Access single Page
Route::get('/{post_category}/{post_name}/{post_id}','Site\singlePageController@singlePage')->name('site.singlePage');
//Access Category Page
Route::get('/{category_name}/{category_id}', 'Site\categoryPageController@categoryPage')->name('site.categoryPage');










