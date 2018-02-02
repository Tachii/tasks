<?php

namespace App\Http\Vendor\Task\ViewComposers;

use B4u\TasksModule\Models\Task;
use Illuminate\View\View;

/**
 * Class TasksComposer
 *
 * Initialized in TasksModuleServiceProvider vendor folder.
 *
 * @package App\Http\Vendor\Task\ViewComposers
 */
class TaskListComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        //@TODO Replace data below with actual data, placeholders for now, to demonstrate logic.
        $view->with('tasks', Task::all());
    }
}