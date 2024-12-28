<?php

use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::prefix('api')
    ->group(function () {
        Route::get('projects', [ProjectController::class, 'list']);
        Route::get('projects/{project}/tasks', [ProjectController::class, 'tasks']);

        Route::get('user/{user}/projects', [UserController::class, 'projects']);
    });
