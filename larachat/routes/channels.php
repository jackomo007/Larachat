<?php

/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('tasks.{projectId}', function ($user, $projectId) {
    
    $canAccess = [];
    
    if($user->email === 'jeal.code47@gmail.com'){
        $canAccess = [1];
    }

    if($user->email === 'gremis@gmail.com'){
        $canAccess = [2];
    }
    return in_array($projectId, $canAccess);
});
