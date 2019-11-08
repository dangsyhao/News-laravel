<?php

/**
 * install Authenticate route
 */
Auth::routes();

/**
 * Admin Group
 */

Route::middleware('dashboard_auth:web')->middleware('auth-admin')->group(function() {

  Route::prefix('admin')->group(function() {
    //Redirect to Author Index Page
    Route::get('/dashboard', 'Admin\dashboardController@dashboard')->name('admin.dashboard');

/**
* Notificate items
*/
Route::get('/notifi-getNotifi', 'Admin\notifi\notificateController@notifi')->name('admin.notifi-getNotifi');
//getAdd
Route::get('/notifi-getAdd', 'Admin\notifi\notificateController@getAdd')->name('admin.notifi-getAdd');
//Add
Route::post('/notifi-add', 'Admin\notifi\notificateController@add')->name('admin.notifi-add');
//getEdit
Route::get('/notifi-getEdit/{id}','Admin\notifi\notificateController@getEdit')->name('admin.notifi-getEdit');
//Edit
Route::post('/notifi-edit', 'Admin\notifi\notificateController@edit')->name('admin.notifi-edit');
//Edit
Route::get('/notifi-read/{id}', 'Admin\notifi\notificateController@read')->name('admin.notifi-read');
//Delete
Route::get('/notifi-del/{id}', 'Admin\notifi\notificateController@del')->name('admin.notifi-del');

/**
* Advertise
*/
Route::get('/advertise-getAdvertise', 'Admin\advertise\advertiseController@getAdvertise')->name('admin.advertise-getAdvertise');
//getAdd
Route::get('/advertise-getAdd', 'Admin\advertise\advertiseController@getAdd')->name('admin.advertise-getAdd');
//Add
Route::post('/advertise-add', 'Admin\advertise\advertiseController@add')->name('admin.advertise-add');
//getEdit
Route::get('/advertise-getEdit/{id}','Admin\advertise\advertiseController@getEdit')->name('admin.advertise-getEdit');
//Edit
Route::post('/advertise-edit', 'Admin\advertise\advertiseController@edit')->name('admin.advertise-edit');
//Edit
Route::get('/advertise-read/{id}', 'Admin\advertise\advertiseController@read')->name('admin.advertise-read');
//Delete
Route::get('/advertise-del/{id}', 'Admin\advertise\advertiseController@del')->name('admin.advertise-del');

/**
* User Manager
*/
  Route::get('/user/get.list', 'Admin\user\userListController@getList')->name('admin.user.getList');
  //getAdd
  Route::get('/user/get.add', 'Admin\user\userListController@getAdd')->name('admin.user.getAdd');
  //Add
  Route::post('/user/set.add', 'Admin\user\userListController@setAdd')->name('admin.user.setAdd');
  //getEdit
  Route::get('/user/get.edit/{id}','Admin\user\userListController@getEdit')->name('admin.user.getEdit');;
  //Edit
  Route::post('/user/set.edit','Admin\user\userListController@setEdit')->name('admin.user.setEdit');
  //Delete
  Route::get('/user/set.delete/{id}','Admin\user\userListController@setDelete');

  /**
   * AuthorCategory
   */
  Route::get('/user_role/get.list', 'Admin\user\userRoleController@getList')->name('admin.user.role.getList');
  //getAdd
  Route::get('/user_role/get.add', 'Admin\user\userRoleController@getAdd')->name('admin.user.role.getAdd');
  //Add
  Route::post('/user_role/set.add', 'Admin\user\userRoleController@setAdd')->name('admin.user.role.setAdd');
  //getEdit
  Route::get('/user_role/get.edit/{id}','Admin\user\userRoleController@getEdit');
  //Edit
  Route::post('/user_role/set.edit', 'Admin\user\userRoleController@setEdit')->name('admin.user.role.setEdit');
  //Delete
  Route::get('/user_role/set.delete/{id}', 'Admin\user\userRoleController@setDelete');

  /**
   * PostList
   */
  Route::get('/post/get.posts', 'Admin\post\postListController@getPostsByFilter')->name('admin.post.getPost');
  /*******/
  Route::get('/post/postList-del/{id}', 'Admin\post\postListController@del')->name('admin.postList-del');
  /*******/
  Route::get('/post/postList-show/{id}', 'Admin\post\postListController@show')->name('admin.postList-show');
  /*******/
  Route::get('/post/postList-accept/{id}', 'Admin\post\postListController@accept')->name('admin.postList-accept');
  /*******/
  Route::get('/post/postList-accept_index/{id}', 'Admin\post\postListController@accept_index')->name('admin.postList-accept_index');

  /**
   * getPostCategoryTable
   */
  Route::get('/post/getPostCategoryTable', 'Admin\post\postCategoryController@post')->name('admin.getPostCategoryTable-post');
  /*******/
  Route::get('/post/getPostCategoryTable-getAdd', 'Admin\post\postCategoryController@getAdd')->name('admin.getPostCategoryTable-getAdd');
  /*******/
  Route::post('/post/getPostCategoryTable-add', 'Admin\post\postCategoryController@add')->name('admin.getPostCategoryTable-add');
  /*******/
  Route::get('/post/getPostCategoryTable-getEdit/{id}','Admin\post\postCategoryController@getEdit')->name('admin.getPostCategoryTable-getEdit');
  /*******/
  Route::post('/post/getPostCategoryTable-edit', 'Admin\post\postCategoryController@edit')->name('admin.getPostCategoryTable-edit');
  /*******/
  Route::get('/post/getPostCategoryTable-del/{id}', 'Admin\post\postCategoryController@del')->name('admin.getPostCategoryTable-del');

  /**
   * Navigation Bar
   */
  Route::get('/navBar-getNavBar', 'Admin\navBar\navBarController@getNavBar')->name('admin.navBar-getNavBar');
  //getAdd
  Route::get('/navBar-getAdd', 'Admin\navBar\navBarController@getAdd')->name('admin.navBar-getAdd');
  //Add
  Route::post('/navBar-add', 'Admin\navBar\navBarController@add')->name('admin.navBar-add');
  //getEdit
  Route::get('/navBar-getEdit/{id}','Admin\navBar\navBarController@getEdit')->name('admin.navBar-getEdit');
  //Edit
  Route::post('/navBar-edit', 'Admin\navBar\navBarController@edit')->name('admin.navBar-edit');
  //Delete
  Route::get('/navBar-del/{id}', 'Admin\navBar\navBarController@del')->name('admin.navBar-del');

/**
* Date
*/
    Route::get('/date/get.list', 'Admin\date\dateController@date')->name('admin.date.getList');
    //getAdd
    Route::get('/date/get.add', 'Admin\date\dateController@getAdd')->name('admin.date.date-getAdd');
    //Add
    Route::post('/date/set.add', 'Admin\date\dateController@setAdd')->name('admin.date.setAdd');
    //getEdit
    Route::get('/date/get.edit/{id}','Admin\date\dateController@getEdit');
    //Edit
    Route::post('/date/set.edit', 'Admin\date\dateController@setEdit')->name('admin.date.setEdit');
    //Delete
    Route::get('/date/set.delete/{id}', 'Admin\date\dateController@setDelete');
  });

    /*
    |->Photos
    */
   Route::get('/photos-getList', 'admin\photos\photoPublicController@getList')->name('admin.photos-getList');
    /*******/
   Route::post('/photos-upload', 'admin\photos\photoPublicController@upload')->name('admin.photos-upload');
    /*******/
   Route::get('/photos-del','admin\photos\photoPublicController@del')->name('admin.photos-del');

});


/*
  |->AUTHOR Page
*/

Route::middleware('dashboard_auth:web')->group(function() {
  // Login Author Page
  Route::prefix('author')->group(function() {

//Author->Author Dashboard
  Route::get('/dashboard', 'Author\authorDashboardController@dashboard')->name('author.dashboard');

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

/*
|-> Site Page
*/

Route::get('/', 'Site\homePageController@index')->name('/');
//Access single Page
Route::get('/{post_category}/{post_name}/{post_id}','Site\singlePageController@singlePage')->name('site.singlePage');
//Access Category Page
Route::get('/{category_name}/{category_id}', 'Site\categoryPageController@categoryPage')->name('site.categoryPage');


/**
 * Site Authenticate
 */

//
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('site.login');
Route::post('/login_submit', 'Auth\LoginController@login')->name('login.submit');

//Register
//Route::get('/Register', 'Auth\AdminRegisterController@showRegisterForm')->name('admin.Register');
//Route::post('/Register', 'Auth\AdminRegisterController@Register')->name('admin.Register.submit');
//
//// Password reset routes
//Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
//Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
//Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
//Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
//Admin Logout
Route::get('/logout', 'Auth\LogoutController@logout')->name('site.logout');

/**
 * Upload function
 */

Route::get('upload/get.upload_box', 'FileUploadController@index')->name('upload.getbox');
Route::post('file-upload/upload', 'FileUploadController@upload')->name('upload');
