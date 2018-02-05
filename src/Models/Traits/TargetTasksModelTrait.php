<?php

namespace B4u\TasksModule\Models\Traits;

use B4u\TasksModule\Models\Task;

/**
 * Trait AssignedTasksModelTrait
 *
 * You include this in a model that must have tasks assigned to it.
 *
 * @package B4u\TasksModule\Traits
 */
trait TargetTasksModelTrait
{
    /**
     * @return mixed
     */
    public function targetedTasks()
    {
        return $this->morphMany(Task::class, 'target');
    }
}