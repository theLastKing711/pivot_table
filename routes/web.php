<?php

use App\Http\Controllers\User\AddUserRoleProjectController;
use Illuminate\Support\Facades\Route;

Route::prefix('users')
    ->middleware(['api'])
    ->group(function () {

        Route::post('adduserroleprojects', AddUserRoleProjectController::class);

    });
