<?php

namespace App\Http\Controllers;

use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\TaskRepository;
//add ruan shan chu 
use Illuminate\Database\Eloquent\SoftDeletes;
class TaskController extends Controller
{
    /**
     * The task repository instance.
     *
     * @var TaskRepository
     */
    protected $tasks;

    /**
     * Create a new controller instance.
     *
     * @param  TaskRepository  $tasks
     * @return void
     */
    public function __construct(TaskRepository $tasks)
    {
        $this->middleware('auth');

        $this->tasks = $tasks;
    }

    /**
     * Display a list of all of the user's task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function index(Request $request)
    {
	$tasks=$this->tasks->forUser($request->user());
	//get delted data from database 
	$tasksfs=Task::onlyTrashed()->where('user_id',$request->user()->id)->get();

	return view('tasks.index',compact('tasks','tasksfs'));


       /* original solution
	     return view('tasks.index', [
            'tasks' => $this->tasks->forUser($request->user()),
        ]);*/
    }

    /**
     * Create a new task.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
        ]);

        $request->user()->tasks()->create([
            'name' => $request->name,
        ]);

        return redirect('/tasks');
    }

    /**
     * Destroy the given task.
     *
     * @param  Request  $request
     * @param  Task  $task
     * @return Response
     */
    public function destroy(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->forceDelete();

        return redirect('/tasks');
    }



     public function finish(Request $request, Task $task)
    {
        $this->authorize('destroy', $task);

        $task->delete();

        return redirect('/tasks');
    }

     public function restore($id)
    {
        $task=Task::onlyTrashed()->where('id',$id)->restore();

        //$task->restore();

        return redirect('/tasks');
		
    }



}
