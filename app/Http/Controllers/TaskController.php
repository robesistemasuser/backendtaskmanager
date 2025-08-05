<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Keyword;
use App\Http\Requests\TaskRequest;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
{
    $tasks = Task::with('keywords:id,name')->get();

    return $tasks->map(function ($task) {
        return [
            'id' => $task->id,
            'title' => $task->title,
            'completed' => $task->is_done,
            'keywords' => $task->keywords->map(function ($k) {
                return [
                    'id' => $k->id,
                    'name' => $k->name
                ];
            })
        ];
    });
}
   

    public function toggle($id)
    {
        $task = Task::findOrFail($id);
        $task->is_done = !$task->is_done;
        $task->save();
        $task->load('keywords');

        return response()->json([
            'id' => $task->id,
            'title' => $task->title,
            'completed' => $task->is_done,
            'keywords' => $task->keywords->pluck('name')->toArray()
        ]);
    }
    public function update(Request $request, $id)
{
    $task = Task::findOrFail($id);
    $task->update($request->only(['title', 'completed']));
    return response()->json($task);
}

public function destroy($id)
{
    $task = Task::findOrFail($id);
    $task->delete();
    return response()->json(['message' => 'Tarea eliminada']);
}
}
