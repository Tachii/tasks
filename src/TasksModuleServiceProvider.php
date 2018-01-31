<?php

namespace B4u\TasksModule;

use App\Http\ViewComposers\TasksComposer;
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

        // Loading and pubishing translations
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang/en', 'tasks');

        $this->publishes([
            __DIR__ . '/resources/lang/en' => resource_path('lang/vendor/en/tasks'),
        ]);

        // Loading views
        $this->loadViewsFrom(__DIR__ . 'resources/views', 'tasks');

        $this->publishes([
            __DIR__ . '/resources/views' => resource_path('views/vendor/tasks'),
        ]);

        // ViewCreator for tasks view
        // Variables assigned vie ViewCreator can be changed inside of the controller.
        View::creator(
            'views.index', TasksComposer::class
        );
    }
}
