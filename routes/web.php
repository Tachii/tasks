<?php
/**
 * Created by PhpStorm.
 * User: glebzaveruha
 * Date: 2/1/18
 * Time: 11:57 AM
 */

Route::resource('tasks', \B4u\TasksModule\Http\Controllers\TaskController::class)->middleware('web');