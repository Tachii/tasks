<?php

namespace App\Http\Vendor\Tasks\ViewComposers;

use B4u\TasksModule\TaskComposerProvider;
use Illuminate\Foundation\Auth\User;
use Illuminate\View\View;

class TasksComposer
{

    public function __construct(TaskComposerProvider $provider)
    {
        dd($provider);
    }

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