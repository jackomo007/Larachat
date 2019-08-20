<?php

namespace App;
use App\Task;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $guarded = [];
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
