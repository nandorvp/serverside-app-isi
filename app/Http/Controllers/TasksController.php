<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TasksController extends Controller
{
    public function getTasks () {
        $tasks = $this->getAllTasks();
        return view('tasks.all', compact('tasks'));
    }

    protected function getAllTasks() {
        $tasks = DB::table('users')
            ->join('tasks', 'users.id', '=', 'tasks.user_id')
            ->select('users.name as Username','tasks.name','tasks.description','tasks.id')
            ->get();

        return $tasks;
    }
    public function viewTask($id)
    {
        $task = Db::table('tasks')
            ->where('tasks.id',$id)
            ->join('users', 'tasks.user_id','=', 'users.id')
            ->select('tasks.*', 'users.name as resname')
            ->first();
        $users = DB::table('users')->get();
        return view('tasks.view', compact('task','users'));
    }

    public function storeTask(Request $request)
    {
            $request->validate([
                'name' => 'string|max:50',
                'description' => 'string|max:50',
                'user_id' => 'integer'
            ]);

            DB::table('tasks')
                ->where('id',$request->task)
                ->insert([
                    'name' => $request->name,
                    'description' =>$request->description,
                    'user_id' => $request->user_id
                ]);

        return redirect()->route('all_tasks');
    }
    public function updateTask(Request $request)
    {
        $request->validate([
            'name' => 'string|max:50',
            'description' => 'string|max:50',
            'user_id' => 'string'
        ]);

        DB::table('tasks')
            ->where('id',$request->task_id)
            ->update([
                'name' => $request->name,
                'description' =>$request->description,
                'user_id' => $request->user_id
            ]);
        return redirect()->route('all_tasks');
    }
    public function deleteTask($id)
    {
        DB::table('tasks')
            ->where('id','=',$id)
            ->delete();

        return redirect()->route('all_tasks');
    }

    public function addTask()
    {
        $users = DB::table('users')->get();
        return view('tasks.add',compact('users'));
    }
}
