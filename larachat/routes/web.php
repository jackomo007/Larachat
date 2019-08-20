<?php

use App\Events\TaskCreated;
use App\Project;
use App\Task;

Route::get('/projects/{project}', function (Project $project) {
    $project->load('tasks');
    
    return view('projects.show', compact('project'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


// API

Route::get('/api/projects/{project}/tasks', function(Project $project) {
   return $project->tasks->pluck('body');
});

Route::post('/api/projects/{project}/tasks', function(Project $project) {
    $task = $project->tasks()->create(request(['body']));

    event(new TaskCreated($task));

    return $task;
});

