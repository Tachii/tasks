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
trait AssignedTasksModelTrait
{
    /**
     * @return mixed
     */
    public function assignedTasks()
    {
        return $this->morphMany(Task::class, 'assigned');
    }

    /**
     * @return string
     */
    public function getUidAttribute(): string
    {
        return md5(class_basename(__CLASS__) . $this->id);
    }
}