@extends('site.app')
@section('content')
    <div class="page page-archive">
        @include('site.page.page-archive.index-block')
        @include('site.page.page-archive.posts-block')
    </div>
@endsection