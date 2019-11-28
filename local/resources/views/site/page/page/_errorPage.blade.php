@extends('site.app')
@section('content')

    <div class="block span12">
        <div class="hero-unit center">
            <h1>Page Not Found <small style="color: red">Error 404</small></h1>
            <br />
            <p>The page you requested could not be found, either contact your webmaster or try again. Use your browsers <b>Back</b> button to navigate to the page you have prevously come from</p>
            <br />
            <p>
                <b>Or you could just press this neat little button:</b>
            </p>
            <br />
            <p>
                <a href="{{route('home')}}" class="btn btn-large btn-info">
                    <i class="icon-home icon-white"></i> Take Me Home
                </a>
                <a href="{{route('site.contact')}}" class="btn btn-large btn-info">
                    <i class="icon-home icon-white"></i> Contact Me
                </a>
            </p>

        </div>
        <!-- By ConnerT HTML & CSS Enthusiast -->
    </div>
@endsection