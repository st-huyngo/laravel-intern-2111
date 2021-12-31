<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Http\Resources\TaskResource;
use App\Interfaces\UserRepositoryInterface;

class UserController extends Controller
{
    private $userRepository;

    /**
     * Create a new controller instance.
     *
     * @param  \App\Interfaces\UserRepositoryInterface;
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepository) 
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTasksBelongToUserId($id)
    {
        $user = new UserResource($this->userRepository->getUserById($id));
        return [
            'user' => $user
        ];
    }
}