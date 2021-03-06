<?php

namespace App\Http\Vendor\Task\ViewComposers;

use Illuminate\Foundation\Auth\User;
use Illuminate\View\View;

/**
 * Class TasksComposer
 *
 * Initialized in TasksModuleServiceProvider vendor folder.
 *
 * @package App\Http\Vendor\Task\ViewComposers
 */
class TaskEditModalComposer extends AbstractComposer
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
        $view->with('issuer', User::first());
        $view->with('responsibles', User::get(['name', 'id']));
    }
}