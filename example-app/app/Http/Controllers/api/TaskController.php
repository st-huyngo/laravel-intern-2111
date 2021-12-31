<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\TaskResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\TaskRepositoryInterface;

class TaskController extends Controller
{

    private $taskRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Interfaces\TaskRepositoryInterface;
     * @return void
     */
    public function __construct(TaskRepositoryInterface $taskRepository) 
    {
        $this->taskRepository = $taskRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TaskResource::collection($this->taskRepository->getAllTasks());
    }
}