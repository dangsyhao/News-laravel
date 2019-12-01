@extends('site.page')
@section('single-page')
    <div class="page-content page-content-404-page">
        <div class="page-title">
            <h1>No results found!<small style="color: red">Error 500</small></h1>
        </div>
        <div class="text" style="margin-top: 2rem">
            <p class="text text-md-left ">The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>
        </div>
        <div class="action" style="margin-top: 2rem">
            <p style="justify-content: center">
                <a href="{{route('home')}}" class="btn btn-large btn-info">
                    <i class="icon-home icon-white"></i> Return home page
                </a>
                <a href="{{route('site.contact')}}" class="btn btn-large btn-info" target="_blank">
                    <i class="icon-home icon-white"></i> Contact By Email
                </a>
            </p>
        </div>
    </div>
    <!-- By ConnerT HTML & CSS Enthusiast -->
@endsection