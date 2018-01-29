<?php

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

trait TasksControllerTrait
{
    /**
     * @param Request $request
     * @return mixed
     */
    public function storeTask(Request $request)
    {
        try {
            $this->entity->tasks()->create($request->all());
            return redirect()->back()->with(
                'message',
                trans('common.messages.updated.updated_text')
            );
        } catch (Exception $exception) {
            Log::error('Task save error: ' . $exception->getMessage());
            return redirect()->back()->withErrors(['message' => @trans('common.messages.errors.text')])->withInput($request->all());
        }
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function deleteTask(Request $request)
    {
        try {
            $this->entity->tasks()->find($request->get('task_id'))->delete();
            return redirect()->back()->with(
                'message',
                trans('common.messages.deleted.deleted_text')
            );
        } catch (Exception $exception) {
            Log::error('Task delete error: ' . $exception->getMessage());
            return redirect()->back()->withErrors(['message' => @trans('common.messages.errors.text')])->withInput($request->all());
        }
    }
}