<?php
use Src\Models\Tasks;

/**
 *
 * You include this in a model that can have tasks
 *
 * Trait TasksModelTrait
 * @package Tasks\Src\Traits
 */
trait TasksModelTrait
{
    /**
     * @return mixed
     */
    public function tasks()
    {
        return $this->morphMany(Tasks::class, 'owner');
    }
}