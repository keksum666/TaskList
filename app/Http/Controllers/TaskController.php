<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Repositories\TaskRepository;


class TaskController extends Controller
{
    protected $tasks;
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');
        $this->tasks = $tasks;
    }

    public function index(Request $request){
        $tasks = $request->user()->tasks()->get();
        return view('index',[
            'tasks'=>$tasks,
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'task'=>'required|max:255'
        ]);
        $request->user()->tasks()->create([
                'name'=>$request->task,]);
        return redirect('/tasks');
    }

    public function destroy(Request $request, Task $task){
        $this->authorize('destroy',$task);
        $task->delete();
        return redirect('/tasks');
    }
}
