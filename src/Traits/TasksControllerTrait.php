<?php

namespace B4u\TasksModule\Traits;

use B4u\TasksModule\Http\Requests\TaskStoreRequest;
use B4u\TasksModule\Models\Tasks;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\Model;

trait TasksControllerTrait
{
    /**
     * @param TaskStoreRequest $request
     * @return mixed
     */
    public function storeTask(TaskStoreRequest $request)
    {
        try {
            $this->entity->assignedTasks()->create($request->all());
            return redirect()->back()->with(
                'message',
                trans('tasks.updated_text')
            );
        } catch (Exception $exception) {
            Log::error('Task save error: ' . $exception->getMessage());
            return redirect()->back()->withErrors(['message' => trans('tasks.error_text')])->withInput($request->all());
        }
    }

    /**
     * @param Tasks $task
     * @return mixed
     */
    public function deleteTask(Tasks $task)
    {
        try {
            $task->delete();
            return redirect()->back()->with(
                'message',
                trans('tasks.deleted_text')
            );
        } catch (Exception $exception) {
            Log::error('Task delete error: ' . $exception->getMessage());
            return redirect()->back()->withErrors(['message' => @trans('tasks.error_text')]);
        }
    }
}