<?php

namespace B4u\TasksModule\Http\Services\Interfaces;

use Illuminate\Support\Collection;

/**
 * Interface HasTasks
 * @package B4u\TasksModule\Http\Services\Interfaces
 */
interface HasTasks
{
    /**
     * Method to create data array that is needed for creation of the task
     *
     * @return array
     */
    public function getTaskCreationData(): array;

    /**
     * Method to get tasks for certain page
     *
     * @return Collection
     */
    public function getTasks(): Collection;
}