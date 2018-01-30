<?php

namespace  B4u\TasksModule;

use Illuminate\Support\ServiceProvider;

class TasksModuleServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if (!class_exists('CreateTasksTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__ . '/../database/migrations/create_tasks_table.php.stub' => $this->app->databasePath() . "/migrations/{$timestamp}_create_tasks_table.php",
            ], 'migrations');
        }

        $this->loadTranslationsFrom(__DIR__.'/resources/lang/en', 'tasks');

        $this->publishes([
            __DIR__.'/resources/lang/en' => resource_path('lang/en/tasks'),
        ]);
    }
}
