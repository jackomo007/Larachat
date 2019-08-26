@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Salas Suscritas</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    @foreach ($subscribeds as $subscribed)
                        <a href="{{'/projects/'.$subscribed->id}}"><i class="material-icons" style="position: absolute;">chat</i><p style="padding-left: 30px;">{{$subscribed->name}}</p></a>    
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Salas Criadas</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                        
                    @foreach ($unsubscribeds as $unsubscribed)
                        <a href="{{'/projects/'.$unsubscribed->id}}"><i class="material-icons" style="position: absolute;">chat_bubble_outline</i><p style="padding-left: 30px;">{{$unsubscribed->name}}</p></a>    
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
