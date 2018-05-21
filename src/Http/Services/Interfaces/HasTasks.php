<?php

namespace B4u\TasksModule\Http\Services\Interfaces;

use B4u\TasksModule\Models\Task;
use Illuminate\Pagination\LengthAwarePaginator;

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
    public static function getTaskCreationData(): array;

    /**
     * Method to get tasks for certain page
     *
     * @return LengthAwarePaginator
     */
    public static function getTasks(): LengthAwarePaginator;

    /**
     * Get data related to edited task
     *
     * @param Task $task
     * @return array
     */
    public static function getTaskEditionData(Task $task): array;
}