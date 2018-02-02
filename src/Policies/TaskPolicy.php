<?php

namespace App\Policies\Vendor\Task;

use B4u\TasksModule\Models\Task;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Auth\User;

class TaskPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the task.
     *
     * @param  User $user
     * @param  Task $task
     * @return bool
     */
    public function view(User $user, Task $task): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create tasks.
     *
     * @param  User $user
     * @return mixed
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the task.
     *
     * @param  User $user
     * @param  Task $task
     * @return mixed
     */
    public function update(User $user, Task $task): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the task.
     *
     * @param  User $user
     * @param  Task $task
     * @return mixed
     */
    public function delete(User $user, Task $task): bool
    {

        return true;
    }
}
