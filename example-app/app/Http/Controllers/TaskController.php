<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\ServiceProvider;
use App\Http\Requests\TaskRequest;
use DB;
use App\Models\Task;
use App\Models\User;
use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;

class TaskController extends Controller
{
    private TaskRepositoryInterface $taskRepository;
    private UserRepositoryInterface $userRepository;

    public function __construct(TaskRepositoryInterface $taskRepository,UserRepositoryInterface $userRepository) 
    {
        $this->taskRepository = $taskRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = $this->taskRepository->getAllTasks();
        return view('admin.task.index', ['tasks' => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->userRepository->getAllUsers();
        return view('admin.task.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        $this->taskRepository->createTask($request->validated());
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
        $task = $this->taskRepository->getTaskById($id);
        return view('admin.task.show', ['task' => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = $this->taskRepository->getTaskById($id);
        $users = $this->userRepository->getAllUsers();
        return view('admin.task.edit', ['task' => $task, 'users' => $users]);
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
        $this->taskRepository->updateTask($id, $request->validated());
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
        $this->taskRepository->deleteTask($id);
        return redirect()->route('tasks.index')->with('message', 'Delete Successfully');
    }
    
    public function findTask(Request $request)
    {
        $tasks = Task::findType($request->type)->get();
        return view('admin.task.index', ['tasks' => $tasks]);   
    }
}