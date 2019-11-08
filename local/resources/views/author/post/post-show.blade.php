@extends('author.app')
@section('content')
        <!-- Data Contents-->
        @if(isset($post_content))
            @foreach($post_content as $row)
                {!! $row->content !!}
            @endforeach
        @endif
@endsection