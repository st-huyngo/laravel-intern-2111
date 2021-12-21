<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
namespace Database\Factories\TaskFactory;

class Task extends Model
{
    use HasFactory;
    protected $table='tasks';
    protected $fillable=['title','description','type','status','start_date','due_date','assignee','estimate','actual'];

}