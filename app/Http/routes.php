<?php

//use Illuminate\Http\Request;
//use Zizaco\Entrust\Entrust;
//use App\Models\Security\User;
//use App\Role;
//use App\Permission;
//use App\Invoice;
//use App\Contact;
//use App\Students;

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

/**
 * Routes for search
 */
//Prueba
//Route::get('prueba','Management\ServiceController@prueba');

Route::get('phpinfo', function () { phpinfo(); });

Route::post('uploadImage','Bulk\UploadBulkImageController@uploadImage')->name('uploadImage');
Route::get('downloadFile','Bulk\DownloadFileController@dowload');

Route::any('rpc', 'RPCController@index');
Route::any('start', 'StartsessionController@index');
Route::any('sync', 'SyncController@index');
Route::any('phpolap', 'PhpolapController@index');

Route::post('/viewpdf/{id}', 'Management\ViewPDFController@index');
Route::get('/viewpdf/{id}', 'Management\ViewPDFController@index');

Route::post('/createpdf/{id}', 'Management\PdviController@generarpdf');
Route::get('/createpdf/{id}', 'Management\PdviController@generarpdf');

Route::post('/tirilla01', 'tirilla01@tirilla01');
Route::get('/tirilla01', 'tirilla01@tirilla01');

/**
 * Mensajeria
 */
Route::get('couriers','Management\CouriersServiceController@getCouriers');
Route::get('courier/{id}','Management\CouriersServiceController@getCourierData');

//PRUEBA FTP
Route::get('ftp','Management\UploadMassiveController@ftptest');

/**
 * Routes for loggin
 */
// Route::get('bip','Auth\LoginController@showview');
// Route::get('bip/supertienda','Auth\LoginController@showBipLogin')->name('bipclient');
// Route::post('bip/supertienda','Auth\LoginController@clientLogin');

// Route::get('supertienda', 'Auth\LoginController@showsupertiendaview');
// Route::get('login/supertienda','Auth\LoginController@showSuperTiendaLogin')->name('supertiendaclient');
// Route::post('login/supertienda', 'Auth\LoginController@login');

Route::get('auth/login', 'Auth\LoginController@showLoginForm');
Route::post('auth/login', 'Auth\LoginController@login')->name('login');

Route::get('auth/login/clients', 'Auth\LoginController@showClientLoginForm')->name('client');
Route::post('auth/login/clients', 'Auth\LoginController@clientLogin');

/**
 * Routes for loggout
 */
//Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/logout', 'Auth\LoginController@logout');
Route::get('/logout', 'Auth\LoginController@logout');

/**
 * routes for home/defaults
 */
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::any('/home/ajax', 'HomeController@ajax');
Route::any('/management/stores', 'Management\StoresController@index')->name('store');

/**
 * Password reset routes
 */
Route::get('/newstore', 'Auth\NewstoreController@registernewstore')->name('newstore');
Route::post('newstore','Auth\NewstoreController@save')->name("savestore");
Route::any('/newstore/ajax','Auth\NewStoreController@ajax');
Route::get('/habeasData', 'Conditions\HabeasDataController@index')->name('habeasData');

Route::any('/storeonline','Management\PdviController@index');
// Route::get('/storeonline','Management\UsersController@password')->name('habeasData');

Route::get('/newsupplier', 'Auth\NewsupplierController@registernewsupplier');
Route::post('newsupplier','Auth\NewsupplierController@save')->name('savesupplier');

Route::get('/newclient', 'Auth\NewclientController@registernewclient')->name('newclient');
Route::post('newclient','Auth\NewclientController@save')->name('saveclient');
Route::any('/newclient/ajax','Auth\NewclientController@ajax');

Route::get('/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
Route::post('/email', 'Auth\ForgotPasswordController@sendResetLinkEmail');
Route::get('/{token}', 'Auth\ResetPasswordController@showResetForm');
Route::post('/reset', 'Auth\ResetPasswordController@validateIfExistOldPass');
Route::get('/{management}/password','Management\UsersController@password');
Route::post('/{management}/update','Management\UsersController@updatePassword');
Route::post('/changepasswordfirsts','Management\UsersController@updatePasswordFirst')->name('changepassword');
Route::get('/passwordfirst','Management\UsersController@passwordFirst')->name('passwordfirst');
/**
 * Routes for search
 */
Route::post('search', 'SidebarController@index');
Route::get('search/ajax', 'SidebarController@ajax');
Route::get('notif', 'NotificationController@index');
Route::match(['get', 'post'], '/viewlist', 'HomeController@viewlist');

/**
 * Routes for validate invalid routes
 */
//Route::match(['get', 'post'], '/{a}', 'HomeController@index');

/**
 * porfavor no borrar
 */
Route::get('/{management}/{catalogsproducts}/eliminar/{id}', 'Management\CatalogsProductsController@deletes');
Route::get('/{group}/{page}/addperson','Management\PersonsController@createPerson');
Route::get('/{group}/{page}/addpersons/{dato}','Management\PersonsController@createPerson');
Route::get('/{group}/{page}/editperson/{id}','Management\PersonsController@editPerson');
Route::post('/{group}/{page}/makeorden','Management\MakeorderController@realizarPedido');
Route::post('/{group}/{page}/newquantity','Management\OrderssuppliersproductsController@newQuantityProducts');
Route::post('/{group}/{page}/changeprovider','Management\OrderssuppliersproductsController@changeProvider');
Route::post('/{group}/{page}/changevalue','Management\OrderssuppliersproductsController@valueChange');
Route::post('/{group}/{page}/addproducts','Management\CatalogsaddController@addproducts');
Route::match(['get', 'post'], '{group}/{page}/confirmorder', 'Management\OrderssuppliersController@confirmOrder');
Route::match(['get', 'post'], '{group}/{page}/transactionorder', 'Management\OrderssuppliersController@transactionOrder');
Route::get('{group}/{page}/formulationorderscheck/{id}', 'Management\FormulationordersController@get');
Route::post('{group}/{page}/clonecatalog', 'Management\CatalogsproductsController@cloneCatalog');
/**
 * Routes for CRUD's - Modules
 */

Route::get('{group}/{page}', 'MainController@index');
Route::post('{group}/{page}', 'MainController@save');
Route::any('{group}/{page}/ajax', 'MainController@ajax');
Route::post('{group}/{page}/activate', 'MainController@activate');
Route::post('{group}/{page}/view', 'MainController@view');
Route::any('{group}/{page}/viewlist', 'MainController@viewlist');
Route::get('{group}/{page}/autocomplete', 'MainController@autocomplete');
Route::match(['get', 'post'], '{group}/{page}/download', 'MainController@download');
Route::delete('{group}/{page}/{id}', 'MainController@delete');
Route::match(['get', 'post'], '{group}/{page}/edit/{id}', 'MainController@edit');
Route::get('{group}/{page}/deleteallproducts/{id}','Management\CatalogsproductsController@deleteAllProducts');


/**
 * Routes Service
 */
Route::any('/service', 'Management\ServiceController@updateFile')->name('service');
Route::post('{group}/{page}/service', 'Management\ServiceController@route');

/**
 * Routes uploadMassiveFiles
 */
Route::post('/downloadFile','Management\UploadMassiveController@downloadFile')->name('downloadFile');
Route::post('/uploadFile','Management\UploadMassiveController@uploadFile')->name('uploadFile');
Route::post('/uploadExcel','Bulk\UploadExcelController@updload')->name('uploadExcel');


/**
 * Rutas codigo QR
 */
Route::get('management/requestDataQrDataQr','Management\PdviController@requestDataQrDataQr')->name('requestDataQr');
Route::get('{group}/{page}/dataBaseQrCallBack','RPCController@servicioDevuelta');

/**
 * Smarthcheout
 */
Route::get('{group}/{page}/smartCheckout','Management\PdviController@smartCheckout');
Route::get('{group}/{page}/callBackConfirmedPayment','Management\PaidProvidersController@callBackConfirmedPayment');
Route::post('/tarjetarecaudo','Management\CollectionCardController@store')->name('tarjetarecaudo');
Route::post('/confirmPayment/{token}','RPCController@rbpdv_ws1_m3');

/**
 * SisteCredito
 */
Route::any('{group}/{page}/getCreditLimitClient','Management\SistecreditController@getCreditLimitClient');
Route::any('{group}/{page}/getCreditDetails','Management\SistecreditController@getCreditDetails');
Route::any('{group}/{page}/getActiveCredits','Management\SistecreditpayController@getActiveCredits');
Route::get('{group}/{page}/payCredit','Management\SistecreditpayController@payCredit');
Route::any('{group}/{page}/getCreditToken','Management\SistecreditController@getCreditToken');
Route::any('{group}/{page}/createSis','Management\SistecreditController@createSis');
Route::get('{group}/{page}/initialChat','Management\SistecreditController@initialChat');
Route::get('{group}/{page}/closeTurn','Management\BalancesheetController@closeTurn');

/**
 * Mensajeros Urbanos
 */
Route::get('{group}/{page}/sendOrder','Management\DeliveriesController@validateDelivery');
Route::get('{group}/{page}/send','Management\DeliveriesController@send');

/**
 * Deliveries
 */
Route::get('{group}/{page}/confirmDelivery/{id}','Management\DeliveriesController@edit');
Route::post('{group}/{page}/assignCurrierToDelivery','Management\DeliveriesController@assignCurrierToDelivery');

Route::get('{group}/{page}/receiveDelivery/{id}/{type}','Management\DeliveriesController@receive');
Route::get('{group}/{page}/edit/{id}/{type}','Management\PdviController@edit');
Route::get('{group}/{page}/rejectTransaction/{id}','Management\SalesController@reject');


/**
 * Couriers
 */
Route::any('{group}/{page}/dispatchCourier','Management\CouriersController@dispatchCourier');

/**
 * Superpagos
 */
Route::get('{group}/{page}/downloadCarnet','Management\SuperPagosController@downloadCarnet')->name('downloadCarnet');

/**
 * Stores
 */
Route::post('management/stores/send','Management\StoresController@send')->name('store.send');
Route::post('management/stores/search','Management\StoresController@search')->name('store.search');

/**
 * Sales
 */
Route::get('management/sales/transactionId/{id}','Management\SalesController@download')->name('store.download');

/**
 * Shopping
 */
// Route::get('management/shopping/transactionId/{id}','Management\ShoppingController@download')->name('store.download');
/**
 * Recaudo
 */
Route::get('{group}/{page}/recaudarCredito/{id}','Management\CreditmanagementController@recaudarCredito');
