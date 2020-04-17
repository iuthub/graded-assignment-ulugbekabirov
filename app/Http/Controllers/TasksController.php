<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Rules\taskValidation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TasksController extends Controller
{
		
		public function getTasks()
		{
		$user = Auth::user();

        $tasks = [];
        if ($user != null){
            $tasks = $user->tasks;
        }

        return view('content', [
    		'tasks' => $tasks
			]);
		}


		public function editTask($id)
		{
		$task = Task::all()->find($id);
        if(Gate::denies('edit-tasks', $task)) {
            return redirect()->back()->with([
                'error' => "You don't have permissions to edit this task."
            ]);
        }
		return view('editTask',[
				'task'=>Task::find($id)
			]);

		}

		public function postEditTask(Request $req) {
			$task = Task::find($req->input('id'));
			$task->name = $req->input('name');
			$task->save();

			
			return redirect()->route('getTasks')->with([
			'tasks' => Task::all()->toArray(),
			'info' => 'The task has been succesfully edited	'

			]);

		}

		public function deleteTask($id)
		{
		$task = Task::find($id);

        if(Gate::denies('edit-tasks', $task)) {
            return redirect()->back()->with([
                'error' => "You don't have permissions to delete this task."
            ]);
        }

    	$taskTitle = $task['name'];

		Task::find($id)->delete();

    	return redirect()->route('getTasks')->with([
    		'info' => 'The task has been succesfully deleted ' 
    	]);
		} 


    public function addTask(Request $req){
    	$validation = $this->validate($req, [
			'name' => ['required', new taskValidation]
		]);


    	 $user = Auth::user();

    	$task = new Task([
            'name' => $req->input('name'),
            'done' => false,

        ]);

        $user->tasks()->save($task);


    	return redirect()->route('getTasks')->with([
    		'tasks' => Task::all()->toArray(),
    		'info' => 'New task has been added'
    	])->withErrors($validation, 'task');
    	}


}
