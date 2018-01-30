<?php

namespace  B4u\TasksModule\Traits;

use Src\Models\Tasks;

/**
 *
 * You include this in a model that can have create new tasks for other entities.
 *
 * Trait TasksModelTrait
 * @package Tasks\Src\Traits
 */
trait IssuedTasksModelTrait
{
    /**
     * @return mixed
     */
    public function issuedTasks()
    {
        return $this->morphMany(Tasks::class, 'issuer');
    }
}