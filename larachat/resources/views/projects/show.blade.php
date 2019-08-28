@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default colorido">
                <div class="panel-heading">Task List</div>
                <div class="panel-body"> 
                    @if($ace == "t")
                        <div id="app">
                            <task-list  v-bind:data-project="{{ $project }}"></task-list>
                        </div>
                    @else
                        <div>
                            <h3>Not your business</h3>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection           