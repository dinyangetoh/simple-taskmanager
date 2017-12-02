<?php

namespace Dinyangetoh\SimpleTaskmanager\Controllers;

use Illuminate\Http\Request;
use Dinyangetoh\SimpleTaskmanager\Controllers\Controller;
use Dinyangetoh\SimpleTaskmanager\Models\TaskCategory;
use Dinyangetoh\SimpleTaskmanager\Models\Task;

class TaskController extends Controller
{
    //
    public function index()
    {

    	$data['categories'] = TaskCategory::get();

    	if(request()->has('category')){
    		$data['taskCategory'] = $category= TaskCategory::where('slug',request()->get('category'))->with('tasks')->first();


    		$data['tasks'] = isset($category->tasks)? $category->tasks: null;
    	}

    	return view('taskmanager::index',$data);
    }

    public function addCategory(Request $request)
    {
    	// return $request;
    	$category = new TaskCategory;
    	$category->name = $request->category;
    	$category->slug = $category->slugIt($request->category);
    	$category->save();

    	return redirect('tasks?category='.$category->slug);
    }

    

    public function deleteCategory($id)
    {
    	$category = TaskCategory::findOrFail($id);
    	$category->tasks()->delete();
    	$category->delete();

    	return redirect('tasks');

    }

    public function updateCategory(Request $request)
    {
    	// return $request;
    	$category = TaskCategory::findOrFail($request->category_id);
    	$category->name = $request->category;
    	$category->slug = $category->slugIt($request->category);
    	$category->save();

    	return redirect('tasks?category='.$category->slug);
    }

     public function addTask(Request $request)
    {
    	// return $request;
    	$task = new Task;
    	$task->title = $request->title;
    	$task->category_id = $request->category_id;
    	$task->save();

    	return redirect()->back();
    }

    public function updateTaskStatus(Request $request)
    {

    	$task = Task::where('id',$request->task_id)->first();
    	$task->completed = $task->completed? false : true;
    	$task->save();

    	return $task;
    }

    public function deleteTask($id)
    {
    	$task = Task::findOrFail($id);
    	$task->delete();

    	return redirect()->back();

    }
}
