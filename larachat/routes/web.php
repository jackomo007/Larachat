<?php

use App\Project;
use App\Task;
use App\Events\TaskCreated;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/projects/{project}', function (Project $project) {
    $project->load('tasks');
    $x =$project->participants->toArray();
    $emails = Arr::pluck($x, 'email');
    
    if(in_array(auth()->user()->email, $emails)){
        $ace = "t";
    } else {
        $ace = "f";
    }
    return view('projects.show', compact('project','ace'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// API

Route::get('/api/projects/{project}/tasks', function(Project $project) {
   
    $x =$project->participants->toArray();
    $emails = Arr::pluck($x, 'email');
    
    if(in_array(auth()->user()->email, $emails)){
        return $project->tasks->pluck('body');
    }
});

Route::post('/api/projects/{project}/tasks', function(Project $project) {
    
    $x =$project->participants->toArray();
    $emails = Arr::pluck($x, 'email');

    if(in_array(auth()->user()->email, $emails)){
       $body = request(['body']);
         $task = new Task([
            'body' => $body["body"],
            'project_id' => $project->id,
            'user_id' =>  auth()->user()->id
        ]);

        $task->save();

        event(new TaskCreated($task));

        return $task;
    }
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
