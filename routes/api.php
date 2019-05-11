<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('crm-statuses', 'CrmStatusApiController');

    Route::apiResource('crm-customers', 'CrmCustomerApiController');

    Route::apiResource('crm-notes', 'CrmNoteApiController');

    Route::apiResource('crm-documents', 'CrmDocumentApiController');

    Route::apiResource('currencies', 'CurrencyApiController');

    Route::apiResource('transaction-types', 'TransactionTypeApiController');

    Route::apiResource('income-sources', 'IncomeSourceApiController');

    Route::apiResource('client-statuses', 'ClientStatusApiController');

    Route::apiResource('project-statuses', 'ProjectStatusApiController');

    Route::apiResource('clients', 'ClientApiController');

    Route::apiResource('projects', 'ProjectApiController');

    Route::apiResource('notes', 'NoteApiController');

    Route::apiResource('documents', 'DocumentApiController');

    Route::apiResource('transactions', 'TransactionApiController');

    Route::apiResource('client-reports', 'ClientReportApiController');
});
