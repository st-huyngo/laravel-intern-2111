<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Task extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['title', 'description', 'type', 'status', 'start_date', 'due_date', 'assignee', 'estimate', 'actual'];

    public function getTypeAttribute($value)
    {
        return [
            '1' => 'Story',
            '2' => 'Task',
            '3' => 'Bug'
        ][$value];
    }
    
    public function getStatusAttribute($value)
    {
        return [
            '1' => 'Open',
            '2' => 'In progress',
            '3' => 'Resolved',
            '4' => 'Verified',
            '5' => 'Closed'
        ][$value];
    }

    public function setTypeAttribute($value)
    {
        $type = [
            'Story' => 1,
            'Task' => 2,
            'Bug' => 3
        ];
        
        $this->attributes['type'] = $type[$value];
    }
    
    public function setStatusAttribute($value)
    {
        $status = [
            'Open' => 1,
            'In progress' => 2,
            'Resolved' => 3,
            'Verified' => 4,
            'Closed' => 5
        ];
        $this->attributes['status'] = $status[$value];
    }

     /**
     * Scope a query to get all tasks.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeGetAllTask($query)
    {
        return $query->get();
    }

     /**
     * Scope a query to only include a task of a given id.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $id
     * @return a task
     */
    public function scopeGetOneTask($query,$id)
    {
        return $query->findOrFail($id);
    }

     /**
     * Scope a query to create a task.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  array $request
     * @return true
     */
    public function scopeCreateTask($query,$request)
    {
        return $query->create($request);
    }

     /**
     * Scope a query to only include tasks of a given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFindType($query,$type)
    {
        return $query->where('type', $type);
    }
    
     /**
     * Scope a query to update a task with given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $request, $id
     * @return true
     */
    public function scopeUpdateTask($query,$id,$request)
    {
        return $query->findOrFail($id)->update($request);
    }

     /**
     * Scope a query to delete a task with given type.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $id
     * @return true
     */
    public function scopeDeleteTask($query,$id)
    {
        return $query->findOrFail($id)->delete();
    }
}