<?php

namespace B4u\TasksModule\Traits;

use B4u\TasksModule\Models\Tasks;

/**
 *
 * You include this in a model that must have tasks assigned to it.
 *
 * Trait TasksModelTrait
 * @package Tasks\Src\Traits
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