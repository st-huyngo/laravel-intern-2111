<?php

namespace App\Http\Controllers\api;

use App\Http\Resources\TaskResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\TaskRepositoryInterface;

class TaskController extends Controller
{
    private $taskRepository;

    public function __construct(TaskRepositoryInterface $taskRepository) 
    {
        $this->taskRepository = $taskRepository;
    }

    public function index()
    {
        return TaskResource::collection($this->taskRepository->getAllTasks());
    }
}