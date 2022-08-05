<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TaskController extends Controller
{

    public function index()
    {
        return TaskResource::collection();
    }


    public function create(Request $request)
    {
        //
    }


    public function store(TaskStoreRequest $request)
    {
        $new_card = Task::create($request->validated());

        return new TaskResource($new_card);

    }


    public function show($id)
    {
        //
    }


    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());

        return new TaskResource($task);
    }


    public function destroy(Task $task)
    {
        $task->delete();

        return response(null,Response::HTTP_NO_CONTENT);
    }
}
