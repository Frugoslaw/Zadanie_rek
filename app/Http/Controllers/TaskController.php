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
        $tasks = auth()->user()->tasks()->paginate(3);
        return view('tasks.index', ['tasks' => $tasks]);
    }

    public function create()
    {
        return view('tasks.create', [
            'priorities' => TaskConstants::PRIORITY,
            'statuses' => TaskConstants::STATUS,
        ]);
    }

    public function store(TaskRequest $request)
    {
        $task = new Task($request->validated());
        $task->save();
        notify()->success('Zadanie zostało pomyślnie utworzone!');
        return redirect()->route('tasks.index')->with('success', 'Task utworzony.');;
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', [
            'task' => $task,
            'priorities' => TaskConstants::PRIORITY,
            'statuses' => TaskConstants::STATUS,
        ]);
    }

    public function update(TaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        notify()->success('Zadanie zostało pomyślnie zaktualizowane!');
        return redirect()->route('tasks.edit', [
            'task' => $task,
            'priorities' => TaskConstants::PRIORITY,
            'status' => TaskConstants::STATUS,
        ])->with('success', 'Task zaktualizowany pomyslnie.');
    }

    public function destroy(Task $task)
    {
        $task->delete();
        notify()->success('Zadanie zostało pomyślnie usunięte!');
        return redirect()->route('tasks.index');
    }

    public function tasks()
    {
        return view('tasks.tasks', ['task' => Task::All()]);
    }

    public function start($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'in progress';
        $task->save();
        notify()->success('Twoje zadanie jest rozpoczęte!');
        return redirect()->route('home')->with('success', 'Zadanie rozpoczęte!');
    }

    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->status = 'done';
        $task->save();
        notify()->success('Twoje zadanie zostało ukończone!');
        return redirect()->route('home')->with('success', 'Zadanie zakończone!');
    }
}
