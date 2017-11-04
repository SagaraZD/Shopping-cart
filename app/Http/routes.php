<?php

// Public Routes

Route::get('/',[
  'uses' => 'userController@sign',
  'as' => 'sign'
]);

//Sign In
Route::post('sign-in', [
  'uses' => 'userController@postSignIn',
  'as' => 'sign-in'
]);


//Auth Group Routes
Route::group(['middleware' => 'auth'], function () {


  //Update Profile
  Route::get('update-profile', [
    'uses' => 'userController@updateProfileView',
    'as' => 'update-profile',
    'middleware' => 'roles',
    'roles' => ['Admin', 'Member']
  ]);

  //Post Update Profile
  Route::post('post-update-profile', [
    'uses' => 'userController@updateUser',
    'as' => 'post-update-profile',
    'middleware' => 'roles',
    'roles' => ['Admin', 'Member']
  ]);


  //Types................................................................

  //Add new type
  Route::get('types-add', [
    'uses' => 'typeController@typeGet',
    'as' => 'types-add',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Post Add type
  Route::post('post-type-add', [
    'uses' => 'typeController@postTypeAdd',
    'as' => 'post-type-add',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Post Edit Type
  Route::post('post-type-edit', [
    'uses' => 'typeController@postTypeEdit',
    'as' => 'post-type-edit',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Delete Type
  Route::get('delete-type/{id}', [
    'uses' => 'typeController@typeDelete',
    'as' => 'delete-type',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Get members View
  Route::get('members', [
    'uses' => 'userController@getMembers',
    'as' => 'members',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Add New Member
  Route::post('add-member', [
    'uses' => 'userController@addMember',
    'as' => 'add-member',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Delete Member
  Route::get('delete-member/{id}', [
    'uses' => 'userController@deleteMember',
    'as' => 'delete-member',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Logout
  Route::get('logout', [
    'uses' => 'userController@getLogout',
    'as' => 'logout'
  ]);


  //Products........................................

  //add new Products
  Route::get('products-add', [
    'uses' => 'productController@productAddView',
    'as' => 'products-add',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Get products
  Route::get('get-products', [
    'uses' => 'productController@getProducts',
    'as' => 'get-products',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Post product add
  Route::post('post-product-add', [
    'uses' => 'productController@postProductAdd',
    'as' => 'post-product-add',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Edit Products View
  Route::get('edit-products/{id}', [
    'uses' => 'productController@editProducts',
    'as' => 'edit-products',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Edit Products
  Route::post('post-product-edit', [
    'uses' => 'productController@postProductEdit',
    'as' => 'post-product-edit',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);


  //Delete Products
  Route::get('delete-product/{id}', [
    'uses' => 'productController@deleteProduct',
    'as' => 'delete-product',
    'middleware' => 'roles',
    'roles' => ['Admin']
  ]);

  //Member Get Products
  Route::get('member-products', [
    'uses' => 'productController@memberGetProducts',
    'as' => 'member-products',
    'middleware' => 'roles',
    'roles' => ['Member']
  ]);

  //Member Get Products By Type
  Route::get('get-type-products/type={id}', [
    'uses' => 'productController@memberGetProductsType',
    'as' => 'get-type-products',
    'middleware' => 'roles',
    'roles' => ['Member']
  ]);



  //Cart..............................................

  //Add to Cart
  Route::post('post-add-to-cart', [
    'uses' => 'cartController@addToCart',
    'as' => 'post-add-to-cart',
    'middleware' => 'roles',
    'roles' => ['Admin', 'Member']
  ]);

  //Get Cart
  Route::get('member-get-cart', [
    'uses' => 'cartController@getCart',
    'as' => 'member-get-cart',
    'middleware' => 'roles',
    'roles' => ['Admin', 'Member']
  ]);

  //Cart Reduce by one
  Route::get('reduce-by-one/id={id}', [
    'uses' => 'cartController@reduceByOne',
    'as' => 'reduce-by-one',
    'middleware' => 'roles',
    'roles' => ['Admin', 'Member']
  ]);

  //Cart Remove Item
  Route::get('remove-item/id={id}', [
    'uses' => 'cartController@removeItem',
    'as' => 'remove-item',
    'middleware' => 'roles',
    'roles' => ['Admin', 'Member']
  ]);

});
