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

        // Pubishing translations
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang/en', 'tasks');

        $this->publishes([
            __DIR__ . '/../resources/lang/en' => resource_path('lang/en/vendor/tasks'),
            __DIR__ . '/../resources/lang/en' => resource_path('lang/nl/vendor/tasks'),
        ]);

        // Loading views and View composers
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/tasks'),
        ]);

        $this->publishes([
            __DIR__ . '/Http/ViewComposers' => app_path('Http/Vendor/ViewComposers'),
        ]);

        // ViewComposer for tasks view
        View::composer(
            'views.index', app_path('Http/Vendor/ViewComposers/TasksComposer')
        );
    }
}
