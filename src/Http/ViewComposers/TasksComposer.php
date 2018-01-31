<?php

namespace App\Http\ViewComposers;

use Illuminate\Foundation\Auth\User;
use Illuminate\View\View;

class TasksComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('responsibles', User::all()->pluck('name', 'id'));
    }
}