<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Rules\taskValidation;

class TasksController extends Controller
{
		
		public function getTasks()
		{
			return view('content',[
				'tasks'=>Task::all()->toArray()
			]);
		}


		public function editTask($id)
		{
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
		Task::find($id)->delete();

    	return redirect()->route('getTasks')->with([
    		'tasks' => Task::all()->toArray(),
    		'info' => 'The task has been succesfully deleted ' 
    	]);
		} 


    public function addTask(Request $req){
    	$validation = $this->validate($req, [
			'name' => ['required', new taskValidation]
		]);


    	$task = new Task();

    	$task->name = $req->input('name');
    	$task->done= false;
    	$task->save();

    	return redirect()->route('getTasks')->with([
    		'tasks' => Task::all()->toArray(),
    		'info' => 'New task has been added'
    	])->withErrors($validation, 'task');
    	}


}
