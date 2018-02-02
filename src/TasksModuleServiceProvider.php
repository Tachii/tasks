<?php

namespace B4u\TasksModule;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TasksModuleServiceProvider extends ServiceProvider
{
    /**
     * Function fires when you run  'php artisan vendor publish'.
     */
    public function boot()
    {
        // Creating migration with current timestamp of the user.
        if (!class_exists('CreateTasksTable')) {
            $timestamp = date('Y_m_d_His', time());

            $this->publishes([
                __DIR__ . '/../database/migrations/create_tasks_table.php.stub' => $this->app->databasePath() . "/migrations/{$timestamp}_create_tasks_table.php",
            ], 'migrations');
        }

        // Loading and publishing translations
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang/en', 'tasks');

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/tasks'),
        ]);

        $this->publishes([
            __DIR__ . '/../resources/lang' => resource_path('lang/vendor/tasks'),
        ]);

        // Loading and publishing views and View composers
        $this->loadViewsFrom(__DIR__ . 'resources/views', 'tasks');

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/tasks'),
        ]);

        $this->publishes([
            __DIR__ . '/Http/ViewComposers' => app_path('Http/Vendor/Task/ViewComposers'),
        ]);

        // ViewComposers for tasks view
        View::composer(
            'tasks::modals.task_create', \App\Http\Vendor\Tasks\ViewComposers\TaskCreateModalComposer::class
        );

        View::composer(
            'tasks::list', \App\Http\Vendor\Tasks\ViewComposers\TaskListComposer::class
        );

        View::composer(
            'tasks::modals.task_edit_body', \App\Http\Vendor\Tasks\ViewComposers\TaskEditModalComposer::class
        );

        // Loading routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    }
}
