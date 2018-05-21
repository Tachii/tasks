<?php

namespace B4u\TasksModule\Http\Controllers;

use B4u\TasksModule\Http\Requests\TaskStoreRequest;
use B4u\TasksModule\Http\Requests\TaskUpdateRequest;
use B4u\TasksModule\Models\Task;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

/**
 * Class TaskController
 * @package B4u\TasksModule\Http\Controllers
 */
class TaskController extends Controller
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->authorizeResource(Task::class);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  TaskStoreRequest $request
     * @return RedirectResponse
     */
    public function store(TaskStoreRequest $request): RedirectResponse
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
     * @param Task $task
     * @return Response
     */
    public function edit(Task $task): Response
    {
        return response()->view('tasks::modals.task_edit_body', ['task' => $task], 200);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param TaskUpdateRequest $request
     * @param Task $task
     * @return RedirectResponse
     */
    public function update(TaskUpdateRequest $request, Task $task): RedirectResponse
    {
        $task->fill($request->all())->save();
        return redirect()->back()->with(
            'success',
            trans('tasks::tasks.saved_text')
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Task $task
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Task $task): RedirectResponse
    {
        $task->delete();
        return redirect()->back()->with(
            'success',
            trans('tasks::tasks.deleted_text')
        );
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|null|\Symfony\Component\HttpFoundation\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function massDestroy(Request $request)
    {
        $tasks = $request->tasks;

        if (empty($tasks)) {
            return null;
        }

        $tasks = Task::find($tasks);
        foreach ($tasks as $task) {
            $this->authorize('delete', $task);
            $task->delete();
        }

        return \response('Success', 200);
    }
}
