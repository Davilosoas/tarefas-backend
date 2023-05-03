<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaskList;
use App\Models\Task;




class ListController extends Controller
{

    public function index()
    {
        $lists = TaskList::all();
        $tasks = Task::all();
        return response()->json(['lists' => $lists, 'tasks' => $tasks]);
    }


    public function createList(Request $request)
    {
        $list = new TaskList;
        
        $list->description = $request->input('description');
        
        $list->save();

        $lists = TaskList::all();

        return response()->json(['message' => 'List created', 'list' => $list, 'lists' => $lists]);
    }
     
    public function renameList(Request $request)
    {
        $id = (string) $request->input('id');
        $list = TaskList::find($id);
        $list->description = $request->input('description');
        $list->save();

        $lists = TaskList::all();
        return response()->json(['message' => 'Task updated', 'task' => $list, 'lists' => $lists]);
    }


    public function deleteList(Request $request)
    {
        $id = (string) $request->input('id');
        $list = TaskList::find($id);
        
        if(!$list) {
            return response()->json(['message' => 'List not found']);
        }

        $list->delete();

        $lists = TaskList::all();
        $tasks = Task::all();
        return response()->json(['message' => 'list deleted', 'lists' => $lists, 'tasks' => $tasks ]);
    }

    function createTask(Request $request) {

        $list_id = $request->input('id');
        $list = TaskList::find($list_id);

        if (!$list) {
            return response()->json(['message' => 'List not found'], 404);
        }

        $task = new Task([
            'description' => $request->input('description'),
            'completed' => false,
        ]);

        $list->tasks()->save($task);
        $tasks = Task::all();

        return response()->json(['message' => 'Task created', 'task' => $task, 'tasks' => $tasks]);
    }

    function renameTask(Request $request) {
        $task_list_id = (string) $request->input('task_list_id');
        $task_id = (string) $request->input('id');
        
        $task = Task::where('id', $task_id)
                    ->where('task_list_id', $task_list_id)
                    ->first();
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        
        $task->description = $request->input('description');
        $task->save();

        $tasks = Task::all();
        
        return response()->json([ 'message' => 'Task updated', 'task' => $task, 'tasks' => $tasks ]);
    }

    function ChangeTaskStatus(Request $request) {

        $task_list_id = (string) $request->input('task_list_id');
        $task_id = (string) $request->input('id');
        
        $task = Task::where('id', $task_id)
                    ->where('task_list_id', $task_list_id)
                    ->first();
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        
        $task->completed = !$task->completed;
        $task->save();

        $tasks = Task::all();
        
        return response()->json(['message' => 'Task updated', 'task' => $task, 'tasks' => $tasks ]);
    }


    function deleteTask(Request $request) {
        $task_list_id = (string) $request->input('task_list_id');
        $task_id = (string) $request->input('id');
        
        $task = Task::where('id', $task_id)
                    ->where('task_list_id', $task_list_id)
                    ->first();
        if (!$task) {
            return response()->json(['message' => 'Task not found'], 404);
        }
        
        $task->delete();

        $tasks = Task::all();

        return response()->json([ 'message' => 'Task deleted', 'tasks' => $tasks ]);
    }

    
}
