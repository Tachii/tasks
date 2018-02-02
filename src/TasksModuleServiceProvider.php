<?php

namespace B4u\TasksModule;

use App\Policies\Vendor\Task\TaskPolicy;
use B4u\TasksModule\Models\Task;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TasksModuleServiceProvider extends ServiceProvider
{
    protected $policies = [
        Task::class => TaskPolicy::class,
    ];

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
            'tasks::modals.task_create', \App\Http\Vendor\Task\ViewComposers\TaskCreateModalComposer::class
        );

        View::composer(
            'tasks::list', \App\Http\Vendor\Task\ViewComposers\TaskListComposer::class
        );

        View::composer(
            'tasks::modals.task_edit_body', \App\Http\Vendor\Task\ViewComposers\TaskEditModalComposer::class
        );

        // Loading routes
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        // Publish & registering security policies security policies

        $this->publishes([
            __DIR__ . '/Policies' => app_path('Policies/Vendor/Task'),
        ]);

        $this->registerPolicies();

        Gate::resource('tasks', 'TaskPolicy');
    }
}
