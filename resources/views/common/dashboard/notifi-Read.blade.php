@extends('layout-master.dashboard.app')
@section('content')
    <div class="backend-post-content">
        <div class="container">
            @if(isset($notifi_list))
                @foreach($notifi_list as $row)
                    <div class="content">
                        <p class="title"><h3>{{$row->title}}</h3></p>
                        <p>{{$row->content}}</p>
                        <p class="backend-author">Author: {{$row->UserTable->name}}</p>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="backend-btn-act">
            <a role="button" class="btn btn-sm btn-outline-primary" href="{{route('dashboard.index')}}">Back</a>
        </div>
    </div>

@endsection 