<?php
Route::delete('tasks/mass-delete', \B4u\TasksModule\Http\Controllers\TaskController::class . '@massDestroy')
    ->middleware('web', 'auth')
    ->name('tasks.massDelete');
Route::resource('tasks', \B4u\TasksModule\Http\Controllers\TaskController::class)->middleware('web', 'auth');
