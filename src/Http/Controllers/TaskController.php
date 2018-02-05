<?php

namespace B4u\TasksModule\Http\Controllers;

use B4u\TasksModule\Http\Requests\TaskStoreRequest;
use B4u\TasksModule\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->authorizeResource(Task::class);
    }

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
        return response()->view('tasks::modals.task_edit_body', ['task' => $task], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param TaskStoreRequest $request
     * @param Task $task
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function update(TaskUpdateRequest $request, Task $task)
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
