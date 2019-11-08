@extends('author.app')
@section('content')
    <div class="container">
            <div class="jumbotron">
        @if(isset($notifi_list))
            @foreach($notifi_list as $row)
                <h1 class="display-4">Thông Báo!</h1>
                <p class="lead">{{$row->title}}</p>
                    <hr class="my-4">
                <p>{{$row->content}}</p>
                <p class="lead"></p>
            @endforeach
        @endif
            </div>
    </div>
@endsection 