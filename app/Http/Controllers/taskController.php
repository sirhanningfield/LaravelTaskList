<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use App\Task;


class taskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get stuff from database
        $tasks = Task::orderBy('id','desc')->paginate(10);

        //
        return view('pages.home')->withTasks($tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,array(
            'task'=>'required|max:255'
            ));

        $task = new Task;
        $task->task = $request->task;

        $task->save();

        //Session::flash('Success','New task was added');

        return redirect()->route('tasks.home');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //get the task from the id
        $task = Task::find($id);

        //send to the edit page
        return view('pages.edit')->withTask($task);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validate the request
        $this->validate($request,array(

            'task'=>'required|max:255'

            )); 
        // edit a task
        $task = Task::find($id);
        $task->task = $request->task;

        //send to database
        $task->save();

        //return to home
        return redirect()->route('tasks.home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Find the task by id
        $task = Task::find($id); 

        //delete from database
        $task->delete();

        //return to homepage
        return redirect()->route('tasks.home');
    }
}
