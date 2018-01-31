<?php

namespace B4u\TasksModule\Traits;

use B4u\TasksModule\Http\Requests\TaskStoreRequest;
use B4u\TasksModule\Models\Tasks;
use Exception;
use Illuminate\Support\Facades\Log;

//@TODO replace with resource controller
trait TasksControllerTrait
{
    /**
     * @param TaskStoreRequest $request
     * @return mixed
     */
    public function storeTask(TaskStoreRequest $request, $issuer, $assigned)
    {
        try {
            Tasks::firstOrcreate($request->all());
            return redirect()->back()->with(
                'message',
                trans('tasks.saved_text')
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