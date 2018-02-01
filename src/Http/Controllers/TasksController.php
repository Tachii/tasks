<?php

namespace B4u\TasksModule\Http\Controllers;

use B4u\TasksModule\Http\Requests\TaskStoreRequest;
use B4u\TasksModule\Models\Tasks;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Log;

class TasksController extends Controller
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
            Tasks::create($request->all());
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
     * @param  Tasks $tasks
     * @return \Illuminate\Http\Response
     */
    public function show(Tasks $tasks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Tasks $tasks
     * @return \Illuminate\Http\Response
     */
    public function edit(Tasks $tasks)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Tasks $tasks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tasks $tasks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Tasks $tasks
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tasks $tasks)
    {
        try {
            $tasks->delete();
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
