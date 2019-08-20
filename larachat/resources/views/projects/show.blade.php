@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Task List</div>

                <div class="panel-body">
                    <div id="app">
                        <task-list  v-bind:data-project="{{ $project }}"></task-list>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection           