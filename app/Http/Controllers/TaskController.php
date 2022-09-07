<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Auth::user()->tasks()->orderBy('title')->get();
        return view('task.index', compact('tasks'));
    }

    public function store(StoreTaskRequest $request)
    {
        $taskData = array_merge($request->all(), ["user_id" => Auth::id()]);
        Task::create($taskData);
        return redirect()->route('tasks.index');
    }

    public function destroy($id)
    {
        $task = Auth::user()->tasks()->findOrFail($id);
        $task->delete();
        return redirect()->route('tasks.index');
    }
}
