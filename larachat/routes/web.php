<?php

use App\Events\TaskCreated;
use App\Project;

Route::get('/', function () {
    return redirect('/home');
});

Route::get('/projects/{project}', function (Project $project) {
    $project->load('tasks');
    
    return view('projects.show', compact('project'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// API

Route::get('/api/projects/{project}/tasks', function(Project $project) {
   
    if($project->participants[0]->email == auth()->user()->email){
        return $project->tasks->pluck('body');
    }
});

Route::post('/api/projects/{project}/tasks', function(Project $project) {
    
    if($project->participants[0]->email == auth()->user()->email){
    
        $task = $project->tasks()->create(request(['body']));

        event(new TaskCreated($task));

        return $task;
    }
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
