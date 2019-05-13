<?php

Route::group(['prefix' => 'v1', 'as' => 'admin.', 'namespace' => 'Api\V1\Admin'], function () {
    Route::apiResource('permissions', 'PermissionsApiController');

    Route::apiResource('roles', 'RolesApiController');

    Route::apiResource('users', 'UsersApiController');

    Route::apiResource('tags', 'TagsApiController');

    Route::apiResource('hospitals', 'HospitalApiController');

    Route::apiResource('examples', 'ExampleApiController');
});
