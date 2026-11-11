<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Task $task)
    {
        //Render the home page and task create form
        $tasks = $task::latest()->take(10)->get();
        return view('todolist',['tasks'=>$tasks]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Task $task)
    {
        //Accepts post request to create new tasks
        $validated = $request->validate([
            'task'=>'required|string|max:225'
        ]);

        $task->create($validated);

        return redirect('/')->with('success','Task written down successfully :)');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, Task $tasks)
    {
        //Display todolist edit page
        $request->validate(['id'=>'required|integer']);

        if($tasks::where('id',$request->id)->exists()){
        $fetched_tasks = $tasks::latest()->take(10)->get();
        
        $refine_task = $tasks->find($request->id);

        return view('edit_task',['tasks'=>$fetched_tasks, 'edit_task'=>$refine_task]);
        }

        return "Invalid Operation :(";

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $tasks)
    {
        //Update the task in the database
        $request->validate([
            'id'=>'required|integer',
            'task'=>'required|string'
            ]);
        if($tasks::where('id',$request->id)->exists()){

            $updated_task = $tasks->find($request->id);
            $updated_task->UPDATE([
                'task'=>$request->task,
                'updated'=>true
            ]);

            return redirect('/')->with('success','Task refined successfully :)');
        }

        return "Invalid Operation :(";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Task $tasks)
    {
        //Delete a task
        $request->validate(['id'=>'required|integer']);
        $_task = $tasks::where('id',$request->id);
        if($_task->exists()){

            $_task->DELETE();

            return redirect('/')->with('success','Task deleted successfully :)');
        }

        return "Invalid Operation :(";
    }
}
