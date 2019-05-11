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

    Route::delete('crm-statuses/destroy', 'CrmStatusController@massDestroy')->name('crm-statuses.massDestroy');

    Route::resource('crm-statuses', 'CrmStatusController');

    Route::delete('crm-customers/destroy', 'CrmCustomerController@massDestroy')->name('crm-customers.massDestroy');

    Route::resource('crm-customers', 'CrmCustomerController');

    Route::delete('crm-notes/destroy', 'CrmNoteController@massDestroy')->name('crm-notes.massDestroy');

    Route::resource('crm-notes', 'CrmNoteController');

    Route::delete('crm-documents/destroy', 'CrmDocumentController@massDestroy')->name('crm-documents.massDestroy');

    Route::resource('crm-documents', 'CrmDocumentController');

    Route::post('crm-documents/media', 'CrmDocumentController@storeMedia')->name('crm-documents.storeMedia');

    Route::delete('currencies/destroy', 'CurrencyController@massDestroy')->name('currencies.massDestroy');

    Route::resource('currencies', 'CurrencyController');

    Route::delete('transaction-types/destroy', 'TransactionTypeController@massDestroy')->name('transaction-types.massDestroy');

    Route::resource('transaction-types', 'TransactionTypeController');

    Route::delete('income-sources/destroy', 'IncomeSourceController@massDestroy')->name('income-sources.massDestroy');

    Route::resource('income-sources', 'IncomeSourceController');

    Route::delete('client-statuses/destroy', 'ClientStatusController@massDestroy')->name('client-statuses.massDestroy');

    Route::resource('client-statuses', 'ClientStatusController');

    Route::delete('project-statuses/destroy', 'ProjectStatusController@massDestroy')->name('project-statuses.massDestroy');

    Route::resource('project-statuses', 'ProjectStatusController');

    Route::delete('clients/destroy', 'ClientController@massDestroy')->name('clients.massDestroy');

    Route::resource('clients', 'ClientController');

    Route::delete('projects/destroy', 'ProjectController@massDestroy')->name('projects.massDestroy');

    Route::resource('projects', 'ProjectController');

    Route::delete('notes/destroy', 'NoteController@massDestroy')->name('notes.massDestroy');

    Route::resource('notes', 'NoteController');

    Route::delete('documents/destroy', 'DocumentController@massDestroy')->name('documents.massDestroy');

    Route::resource('documents', 'DocumentController');

    Route::post('documents/media', 'DocumentController@storeMedia')->name('documents.storeMedia');

    Route::delete('transactions/destroy', 'TransactionController@massDestroy')->name('transactions.massDestroy');

    Route::resource('transactions', 'TransactionController');

    Route::delete('client-reports/destroy', 'ClientReportController@massDestroy')->name('client-reports.massDestroy');

    Route::resource('client-reports', 'ClientReportController');
});
