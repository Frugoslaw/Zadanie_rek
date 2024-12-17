<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Constants\TaskConstants;
use App\Http\Requests\TaskRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = auth()->user()->tasks()->get();
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create', [
            'priorities' => TaskConstants::PRIORITY,
            'status' => TaskConstants::STATUS,
        ]);
    }

    public function store(TaskRequest $request)
    {
        $task = new Task($request->validated());
        $task->save();

        return redirect()->route('tasks.index')->with('success', 'Task utworzony.');;
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task,
            'priorities' => TaskConstants::PRIORITY,
            'status' => TaskConstants::STATUS,
        ]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->all());
        return redirect()->route('tasks.edit', [
            'task' => $task,
            'priorities' => TaskConstants::PRIORITY,
            'status' => TaskConstants::STATUS,
        ])->with('success', 'Task utworzony pomyslnie.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
