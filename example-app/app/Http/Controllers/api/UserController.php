<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\TaskResource;
use App\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function getTaskByUserId($id)
    {
        $user = new UserResource($this->userRepository->getUserById($id));
        $tasks = TaskResource::collection($user->tasks);
        return [
            'user' => $user,
            'tasks' => $tasks
        ];
    }
}