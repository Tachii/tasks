<?php

namespace App\Http\Vendor\Task\ViewComposers;


/**
 * Class AbstractComposer
 * @package App\Http\Vendor\Task\ViewComposers
 */
abstract class AbstractComposer
{
    // Mapping of relation Model => Service
    protected $serviceMapping = [
        /*User::class => UserTaskDataService::class*/
    ];
}