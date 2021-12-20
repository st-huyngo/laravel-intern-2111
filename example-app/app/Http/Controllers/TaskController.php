<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\ServiceProvider;
use App\Http\Requests\TaskRequest;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->value();
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
        return redirect()->back()->with('message', 'Create Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($key)
    {
        $task = $this->handleValue($key);
        return view('admin.task.show',['task' => $task,'key'=>$key]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($key)
    {
        $task = $this->handleValue($key);
        return view('admin.task.edit',['task' => $task,'key' => $key]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TaskRequest $request, $key)
    {
        return redirect()->back()->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($key)
    {
        return redirect()->back()->with('message', 'Delete Successfully');
    }
    
    public function value()
    {
        return [
            'task1' =>[
                'title' => 'Task December',
                'description' =>'Task December',
                'type' => 'Task',
                'status' => '1',
                'start_date' => '1/12/2021',
                'due_date' => '31/12/2021',
                'assignee' => 'Minh Dao',
                'estimate' => '15 days',
                'actual' => '13 days'
            ],
            'task2' =>[
                'title' => 'Task December 1',
                'description' =>'Task December 1',
                'type' => 'Task 1',
                'status' => '2',
                'start_date' => '1/12/2021',
                'due_date' => '31/12/2021',
                'assignee' => 'Minh Dao',
                'estimate' => '20 days',
                'actual' => '19 days'
            ]
        ];
    }

    public function handleValue($key){
        $value = $this->value();
        foreach ($value as $k => $v) {
            if ($key == $k){
                $task = $value[$k];
            }
        }
        return $task;
    }
}