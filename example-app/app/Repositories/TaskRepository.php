<?php

namespace App\Repositories;

use App\Interfaces\TaskRepositoryInterface;
use App\Models\Task;

class TaskRepository implements TaskRepositoryInterface 
{
    public function getAllTasks() 
    {
        return Task::all();
    }

    public function getTaskById($TaskId) 
    {
        return Task::findOrFail($TaskId);
    }

    public function deleteTask($TaskId) 
    {
        Task::destroy($TaskId);
    }

    public function createTask(array $TaskDetails) 
    {
        return Task::create($TaskDetails);
    }

    public function updateTask($TaskId, array $newDetails) 
    {
        return Task::find($TaskId)->update($newDetails);
    }
    
}