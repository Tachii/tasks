<?php

namespace B4u\TasksModule\Http\Controllers;

use B4u\TasksModule\Http\Requests\TaskStoreRequest;
use B4u\TasksModule\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TaskStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskStoreRequest $request)
    {
        try {
            Task::create($request->all());
            return redirect()->back()->with(
                'success',
                trans('tasks::tasks.saved_text')
            );
        } catch (\Exception $exception) {
            Log::error('Task save error: ' . $exception->getMessage());
            return redirect()->back()->withErrors(['message' => trans('tasks::tasks.error_text')])->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  Task $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Task $tasks)
    {
        //
    }

    /**
     * @param Task $task
     * @return \Illuminate\Http\JsonResponse
     * @throws \Throwable
     */
    public function edit(Task $task)
    {
        try {
            return response()->view('tasks::modals.edit', ['task' => $task], 200);
        } catch (\Exception $exception) {
            
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        try {
            $task->fill($request->all())->save();
            return redirect()->back()->with(
                'success',
                trans('tasks::tasks.saved_text')
            );
        } catch (\Exception $exception) {
            Log::error('Task save error: ' . $exception->getMessage());
            return redirect()->back()->withErrors(['message' => trans('tasks::tasks.error_text')])->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Task $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        try {
            $task->delete();
            return redirect()->back()->with(
                'success',
                trans('tasks::tasks.deleted_text')
            );
        } catch (\Exception $exception) {
            Log::error('Task delete error: ' . $exception->getMessage());
            return redirect()->back()->withErrors(['message' => trans('tasks::tasks.error_text')]);
        }
    }
}
