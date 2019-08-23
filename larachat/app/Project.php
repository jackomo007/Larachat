<?php

namespace App;
use App\Task;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $guarded = [];
    
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function participants()
    {
        return $this->belongsToMany(User::class, 'project_participants');
    }
}
