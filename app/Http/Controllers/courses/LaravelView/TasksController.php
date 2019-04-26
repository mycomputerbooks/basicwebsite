<?php

namespace App\Http\Controllers\courses\LaravelView;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\courseModels\laravelView\Task;
// use Illuminate\Support\Facades\Auth;
use Auth;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd("IT WORKS");
        //200 is the status??
        $tasks = Auth::user()->tasks;
        //$tasks = Task::orderBy('name', 'asc', 'id');
        return response()->json([
            'tasks'=>$tasks
        ], 200);
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
        $request->validate([
            'name'=> 'required',
            'body'=> 'required'
        ]);

        $task = $request->user()->tasks()->create([
            'name'=> $request->name,
            'body'=> $request->body
        ]);

        return response()->json([
           'task'=> $task,
           'message'=> 'task has been created!'
        ]);
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
        //
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
        $request->validate([
            'name'=> 'required',
            'body'=> 'required'
        ]);

        $task = $request->user()->tasks()->whereId($id)->update($request->all());

        return response()->json([
            'task'=> $task,
            'message'=> 'task has been Updated!'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
        //

        $task->delete();
        return response()->json([
            'task'=> $task,
            'message'=> 'task has been Deleted!'
        ]);

    }

}
