<?php

namespace B4u\TasksModule\Models\Traits;

use B4u\TasksModule\Models\Task;


/**
 *
 * You include this in a model that can have create new tasks for other entities.
 *
 * Trait IssuedTasksModelTrait
 * @package B4u\TasksModule\Traits
 */
trait IssuedTasksModelTrait
{
    /**
     * @return mixed
     */
    public function issuedTasks()
    {
        return $this->morphMany(Task::class, 'issuer');
    }
}