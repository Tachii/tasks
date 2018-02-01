<?php

namespace App\Http\Vendor\Tasks\ViewComposers;

use B4u\TasksModule\Models\Tasks;
use Illuminate\Foundation\Auth\User;
use Illuminate\View\View;

/**
 * Class TasksComposer
 *
 * Initialized in TasksModuleServiceProvider vendor folder.
 *
 * @package App\Http\Vendor\Tasks\ViewComposers
 */
class TasksListComposer
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
        $view->with('tasks', Tasks::all());
    }
}