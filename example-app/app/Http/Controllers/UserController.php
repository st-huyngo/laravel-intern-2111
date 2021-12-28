<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\TaskResource;
use App\Interfaces\TaskRepositoryInterface;
use App\Interfaces\UserRepositoryInterface;
class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {   
        $users = UserResource::collection($this->userRepository->getAllUsers());
        return view('admin.user.index', ['users' => $users]);
    }

    public function show($id)
    {
        $user = new UserResource($this->userRepository->getUserById($id));
        $tasks = TaskResource::collection($user->tasks);
        return view('admin.user.show', ['user' => $user, 'tasks' => $tasks]);
    }
}