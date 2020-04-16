<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
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
			'info' => 'The task has been updated'. $req->input('id')

			]);

		}

		public function deleteTask($id)
		{
		Task::find($id)->delete();

    	return redirect()->route('getTasks')->with([
    		'tasks' => Task::all()->toArray(),
    		'info' => 'The task has been deleted ' . $id
    	]);
		} 


    public function addTask(Request $req){
    	$task = new Task();

    	$task->name = $req->input('name');
    	$task->done= false;
    	$task->save();

    	return redirect()->route('getTasks')->with([
    		'tasks' => Task::all()->toArray(),
    		'info' => 'The task has been added'
    	]);
    	}


}
