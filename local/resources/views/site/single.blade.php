@extends('site.app')
@section('content')
    <div class="grids">
        @if(isset($post_list))
            @foreach($post_list as $row)
                @include('site.single.content')
                <div class="clearfix"></div>
                @include('site.single.comment')
            @endforeach
        @endif
    </div>
    <div class="clearfix"></div>
@endsection