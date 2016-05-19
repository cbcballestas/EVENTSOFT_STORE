<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['middleware' => 'web'],function(){
    Route::bind('product',function($slug){
    	return App\Product::where('slug',$slug)->first();
    });
    // Inyección de dependencias con categorías
    Route::bind('category',function($category){
    	return App\Category::find($category);
    });
     
    // User dependency inject 
    Route::bind('users',function($user){
        return App\User::find($user);
    });

    Route::get('/', [
		'as'   => 'home',
		'uses' => 'StoreController@index'
    ]);

    Route::get('contacto/',function(){
        return view('store.conocenos');
    });

    Route::get('product/{slug}',[
    	'as' => 'product-detail',
    	'uses' =>'StoreController@show'
    ]);

    Route::get('categories/{slug}', [ 
        'as' => 'categories', 
        'uses' => 'StoreController@category' 
    ]); 
    // Carrito ------------
    Route::get('cart/show',[
    	'as' => 'cart-show',
    	'uses' =>'CartController@show'
    ]);
    Route::get('cart/add/{product}',[
    	'as' =>'cart-add',
    	'uses' => 'CartController@add'
    ]);
    Route::get('cart/delete/{product}',[
    	'as' =>'cart-delete',
    	'uses' => 'CartController@delete'
    ]);
    Route::get('cart/trash',[
    	'as' => 'cart-trash',
    	'uses' =>'CartController@trash'
    ]);
    Route::get('cart/update/{product}/{quantity}', [
		'as' => 'cart-update',
		'uses' => 'CartController@update'
    ]);
    Route::get('order-detail',[
		'middleware' => 'auth',
		'as'         => 'order-detail',
		'uses'       => 'CartController@orderDetail'
    ]);
});

    // Authentication routes...
	Route::get('auth/login', [
	'as' => 'login-get',
	'uses' => 'Auth\AuthController@getLogin'
	]);
	Route::post('auth/login', [
	'as' => 'login-post',
	'uses' => 'Auth\AuthController@postLogin'
	]);
	Route::get('auth/logout', [
	'as' => 'logout',
	'uses' => 'Auth\AuthController@logout'
	]);
	
	// Registration routes...
	Route::get('auth/register', [
	'as' => 'register-get',
	'uses' => 'Auth\AuthController@getRegister'
	]);
	Route::post('auth/register', [
	'as' => 'register-post',
	'uses' => 'Auth\AuthController@postRegister'
	]);

	// Paypal

	//Enviar pedido a paypal

	Route::get('payment',[
		'as' => 'payment',
		'uses' =>'PaypalController@postPayment'
	]);
	Route::get('payment/status',[
		'as' => 'payment.status',
		'uses' =>'PaypalController@getPaymentStatus'
	]);

	/* Admin --------------*/
    Route::group(['namespace' => 'Admin','middleware' => 'auth','prefix' => 'admin'], function() {
    
    Route::get('dashboard',function(){
        return view('admin.home');
    });

    /* Reportes*/

    Route::get('reportes',[
        'uses' => 'ReportController@index',
        'as'   => 'admin.reports.index'
    ]);

    /* Categorias ----------*/
    Route::resource('category','CategoryController');
    Route::get('category/editar/{category}',[
        'uses' => 'CategoryController@edit',
        'as'   => 'admin.category.edit'
    ]);
    Route::get('category/eliminar/{category}',[
        'uses' => 'CategoryController@destroy',
        'as'   => 'admin.category.destroy'
    ]);

    /* Productos ------------*/
    Route::resource('product', 'ProductController');
    Route::get('product/editar/{product}',[
        'uses' => 'ProductController@edit',
        'as'   => 'admin.product.edit'
    ]);
    Route::get('product/eliminar/{product}',[
        'uses' => 'ProductController@destroy',
        'as'   => 'admin.product.destroy'
    ]);

    /* Usuarios ---------------*/
    Route::resource('users', 'UserController');
    Route::get('users/editar/{user}',[
        'uses' => 'UserController@edit',
        'as'   => 'admin.users.edit'
    ]);

    /* Orders ------------------*/
    Route::get('orders',[
        'as' => 'admin.orders.index',
        'uses' => 'OrderController@index'
    ]);
    Route::post('orders/get-items', [
        'as' => 'admin.orders.getItems',
        'uses' => 'OrderController@getItems'
    ]);
    Route::get('orders/{id}', [
        'as' => 'admin.orders.destroy',
        'uses' => 'OrderController@destroy'
    ]); 
    });