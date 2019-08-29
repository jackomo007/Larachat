<?php

namespace App;
use App\Project;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public $guarded = [];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}
