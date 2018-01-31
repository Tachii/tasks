<?php

namespace B4u\TasksModule\Traits;

use B4u\TasksModule\Models\Tasks;

/**
 * Trait AssignedTasksModelTrait
 *
 * You include this in a model that must have tasks assigned to it.
 *
 * @package B4u\TasksModule\Traits
 */
trait AssignedTasksModelTrait
{
    /**
     * @return mixed
     */
    public function assignedTasks()
    {
        return $this->morphMany(Tasks::class, 'assigned');
    }
}