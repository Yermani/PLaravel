<?php

use Illuminate\Support\Facades\Route;

require __DIR__.'/auth.php';


// Sans Auth
Route::get('/contact', 'App\Http\Controllers\WelcomeController@contact')
     ->name('contact');

Route::get('/', 'App\Http\Controllers\WelcomeController@welcome')
     ->name('welcome');
    


//auth route  
Route::group(['middleware' => ['auth']], function() { 
    Route::get('/dashboard', 'App\Http\Controllers\DashboardController@index')->name('dashboard');
    Route::get('/alerts/{type}', 'App\Http\Controllers\DashboardController@alerts')->name('alerts');
    Route::get('/goAlert/{id}', 'App\Http\Controllers\DashboardController@goAlert')->name('goAlert');
    Route::get('/profile', 'App\Http\Controllers\DashboardController@profile')->name('profile');
    Route::post('/profilePost', 'App\Http\Controllers\DashboardController@profilePost')->name('profilePost');
    Route::post('/addSecurites', 'App\Http\Controllers\SecuriteController@addSecurites')->name('addSecurites');
    Route::get('/posteclients/{projet_id}/{user_id}', 'App\Http\Controllers\PointageController@posteclients')->name('posteclients');
    Route::get('/note/{file}', 'App\Http\Controllers\DashboardController@gofile')->name('gofile');
});



// for Admin
Route::group(['middleware' => ['auth', 'role:admin']], function() { 

//Securite
    Route::get('/admin/securites', 'App\Http\Controllers\SecurityController@adminShowSecurites')->name('adminShowSecurites');
    Route::get('/admin/editSecurite/{id}', 'App\Http\Controllers\SecurityController@adminEditSecurite')->name('adminEditSecurite');
    Route::post('/admin/editSecuritePost', 'App\Http\Controllers\SecurityController@adminEditSecuritePost')->name('adminEditSecuritePost');
    Route::get('/admin/scheduleDateContrat', 'App\Http\Controllers\SecurityController@schedule')->name('scheduleDateContrat');

//Users
    Route::get('/admin/users', 'App\Http\Controllers\AdminUserController@adminShowUsers')->name('adminShowUsers');
    Route::get('/admin/user/{id}', 'App\Http\Controllers\AdminUserController@adminShowUser')->name('adminShowUser');
    Route::get('/admin/adminAddUser', 'App\Http\Controllers\AdminUserController@adminAddUser')->name('adminAddUser');
    Route::POST('/admin/adminAddUserPost', 'App\Http\Controllers\AdminUserController@adminAddUserPost')->name('adminAddUserPost');
    Route::get('/admin/adminEditUser/{id}', 'App\Http\Controllers\AdminUserController@adminEditUser')->name('adminEditUser');
    Route::POST('/admin/adminEditUserPost', 'App\Http\Controllers\AdminUserController@adminEditUserPost')->name('adminEditUserPost');
    //Route::get('/admin/adminDeleteUser/{id}', 'App\Http\Controllers\AdminUserController@adminDeleteUser')->name('adminDeleteUser');
    //Route::POST('/admin/adminDeleteUserPost', 'App\Http\Controllers\AdminUserController@adminDeleteUserPost')->name('adminDeleteUserPost');

//Roles    
    Route::get('/admin/roles', 'App\Http\Controllers\AdminUserController@adminShowRoles')->name('adminShowRoles');
    Route::get('/admin/adminAddRole', 'App\Http\Controllers\AdminUserController@adminAddRole')->name('adminAddRole');
    Route::POST('/admin/adminAddRolePost', 'App\Http\Controllers\AdminUserController@adminAddRolePost')->name('adminAddRolePost');
    Route::get('/admin/adminEditRole/{id}', 'App\Http\Controllers\AdminUserController@adminEditRole')->name('adminEditRole');
    Route::POST('/admin/adminEditRolePost', 'App\Http\Controllers\AdminUserController@adminEditRolePost')->name('adminEditRolePost');
    Route::get('/admin/adminDeleteRole/{id}', 'App\Http\Controllers\AdminUserController@adminDeleteRole')->name('adminDeleteRole');
    Route::POST('/admin/adminDeleteRolePost', 'App\Http\Controllers\AdminUserController@adminDeleteRolePost')->name('adminDeleteRolePost');
    
//Permission
    Route::get('/admin/permissions', 'App\Http\Controllers\AdminUserController@adminShowPermissions')->name('adminShowPermissions');
    Route::get('/admin/adminAddPermission', 'App\Http\Controllers\AdminUserController@adminAddPermission')->name('adminAddPermission');
    Route::POST('/admin/adminAddPermissionPost', 'App\Http\Controllers\AdminUserController@adminAddPermissionPost')->name('adminAddPermissionPost');
    Route::get('/admin/adminEditPermission/{id}', 'App\Http\Controllers\AdminUserController@adminEditPermission')->name('adminEditPermission');
    Route::POST('/admin/adminEditPermissionPost', 'App\Http\Controllers\AdminUserController@adminEditPermissionPost')->name('adminEditPermissionPost');
    Route::get('/admin/adminDeletePermission/{id}', 'App\Http\Controllers\AdminUserController@adminDeletePermission')->name('adminDeletePermission');
    Route::POST('/admin/adminDeletePermissionPost', 'App\Http\Controllers\AdminUserController@adminDeletePermissionPost')->name('adminDeletePermissionPost');

  //CRUD Notes
    Route::get('/admin/notes', 'App\Http\Controllers\ConfigurationController@adminShowNotes')->name('adminShowNotes');
    Route::get('/admin/note/{id}', 'App\Http\Controllers\ConfigurationController@adminShowNote')->name('adminShowNote');
    Route::get('/admin/adminAddNote', 'App\Http\Controllers\ConfigurationController@adminAddNote')->name('adminAddNote');
    Route::POST('/admin/adminAddNotePost', 'App\Http\Controllers\ConfigurationController@adminAddNotePost')->name('adminAddNotePost');
    Route::get('/admin/adminEditNote/{id}', 'App\Http\Controllers\ConfigurationController@adminEditNote')->name('adminEditNote');
    Route::POST('/admin/adminEditNotePost', 'App\Http\Controllers\ConfigurationController@adminEditNotePost')->name('adminEditNotePost');
    Route::get('/admin/adminDeleteNote/{id}', 'App\Http\Controllers\ConfigurationController@adminDeleteNote')->name('adminDeleteNote');
    Route::POST('/admin/adminDeleteNotePost', 'App\Http\Controllers\ConfigurationController@adminDeleteNotePost')->name('adminDeleteNotePost');



//CRUD Produits
    //Afficher un ou tous les produits
    Route::get('/admin/produits','App\Http\Controllers\ProduitController@adminShowProduits')->name('adminShowProduits');
    Route::get('/admin/produit/{id}','App\Http\Controllers\ProduitController@adminShowProduit')->name('adminShowProduit');
    
    Route::get('/admin/adminAddProduit','App\Http\Controllers\ProduitController@adminAddProduit')->name('adminAddProduit');
    Route::Post('/admin/adminAddProduitPost','App\Http\Controllers\ProduitController@adminAddProduitPost')->name('adminAddProduitPost');
   
    Route::get('/admin/adminEditProduit/{id}','App\Http\Controllers\ProduitController@adminEditProduit')->name('adminEditProduit');
    Route::Post('/admin/adminEditProduitPost','App\Http\Controllers\ProduitController@adminEditProduitPost')->name('adminEditProduitPost');
   
    Route::get('/admin/adminDeleteProduit/{id}','App\Http\Controllers\ProduitController@adminDeleteProduit')->name('adminDeleteProduit');
    Route::Post('/admin/adminDeleteProduitPost','App\Http\Controllers\ProduitController@adminDeleteProduitPost')->name('adminDeleteProduitPost');
   
  
});



// for users
Route::group(['middleware' => ['auth', 'role:user']], function() { 
    Route::get('/dashboard/myprofile', 'App\Http\Controllers\DashboardController@myprofile')->name('dashboard.myprofile');
});


