<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\ServiceProvider;
use App\Http\Requests\TaskRequest;
use DB;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = DB::table('tasks')->get();
        return view('admin.task.index',['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.task.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $start_date = date('Y-m-d'); //Fomat Date 
        $start_date = $request->start_date;
        $due_date = date('Y-m-d'); 
        $due_date = $request->due_date;
        DB::table('tasks')->insert([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status,
            'start_date' => $start_date,
            'due_date' => $due_date,
            'assignee' => $request->assignee,
            'estimate' => $request->estimate,
            'actual' => $request->actual,
        ]);
        return redirect()->back()->with('message', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = DB::table('tasks')->find($id);
        return view('admin.task.show',['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = DB::table('tasks')->find($id);
        return view('admin.task.edit',['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $id)
    {
        $start_date = date('Y-m-d'); //Fomat Date 
        $start_date = $request->start_date;
        $due_date = date('Y-m-d'); 
        $due_date = $request->due_date;
        DB::table('tasks')->where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'status' => $request->status,
            'start_date' => $start_date,
            'due_date' => $due_date,
            'assignee' => $request->assignee,
            'estimate' => $request->estimate,
            'actual' => $request->actual,
        ]);
        return redirect()->back()->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('tasks')->where('id', $id)->delete();
        return redirect('/tasks')->with('message', 'Delete Successfully');
    }
    
}