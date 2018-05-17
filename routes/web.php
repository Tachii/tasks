<?php

Route::resource('tasks', \B4u\TasksModule\Http\Controllers\TaskController::class)->middleware('web');