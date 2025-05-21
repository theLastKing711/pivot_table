<?php

use App\Http\Controllers\User\AddUserRoleProjectController;
use App\Http\Controllers\User\GetProjectsController;
use App\Http\Controllers\User\GetUserRoleProjectController;
use App\Http\Controllers\User\UpdateUserRoleProjectController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')
    ->middleware(['api'])
    ->group(function () {

        Route::get('getuserroleprojects', GetUserRoleProjectController::class);
        Route::get('{id}/getprojects', GetProjectsController::class);

        Route::post('adduserroleprojects', AddUserRoleProjectController::class);
        Route::patch('updateuserroleprojects', UpdateUserRoleProjectController::class);

    });
