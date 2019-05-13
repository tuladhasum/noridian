<?php

Route::redirect('/', '/login');

Route::redirect('/home', '/admin');

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('audit-logs/destroy', 'AuditLogsController@massDestroy')->name('audit-logs.massDestroy');

    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    Route::delete('tags/destroy', 'TagsController@massDestroy')->name('tags.massDestroy');

    Route::resource('tags', 'TagsController');

    Route::delete('hospitals/destroy', 'HospitalController@massDestroy')->name('hospitals.massDestroy');

    Route::resource('hospitals', 'HospitalController');

    Route::delete('examples/destroy', 'ExampleController@massDestroy')->name('examples.massDestroy');

    Route::resource('examples', 'ExampleController');

    Route::post('examples/media', 'ExampleController@storeMedia')->name('examples.storeMedia');
});
