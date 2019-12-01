@extends('site.page')
@section('single-page')
    <div class="page-content page-content-contact-page">
        <div class="page-title">
            <h1>Love to Hear From You</h1>
        </div>
        <div class="text" style="margin-top: 1rem">
            <p class="text text-md-left ">Do you have any questions? Please to contact me directly. I will come back to you within a matter of hours to help you.</p>
        </div>
        <div class="address-info" style="margin-top: 1rem">
            <div class="find-widget">
                <strong>Name :</strong><span style="padding-left: 5px">Đặng Sỹ Hào</span>
            </div>
            <div class="find-widget">
                <strong>Gender :</strong><span style="padding-left: 5px">male</span>
            </div>
            <div class="find-widget">
                <strong>Year of Birth :</strong><span style="padding-left: 5px">1991</span>
            </div>
            <div class="find-widget">
                <strong>Address :</strong><span style="padding-left: 5px">Pham Van Dong street, Thu Duc Distric , Ho Chi Minh City</span>
            </div>
            <div class="find-widget">
                <strong>Phone :</strong><span style="padding-left: 5px">0962.059.157</span>
            </div>
            <div class="find-widget">
                <strong>Email :</strong><span style="padding-left: 5px">dangsyhao91@gmail.com</span>
            </div>
        </div>
        <div class="action" style="margin-top: 1rem">
            <p style="justify-content: center">
                <a href="{{route('home')}}" class="btn btn-large btn-info">
                    <i class="icon-home icon-white"></i> Return home page
                </a>
                <a href="https://accounts.google.com/" class="btn btn-large btn-info" target="_blank">
                    <i class="icon-home icon-white"></i> Contact By Email
                </a>
            </p>
        </div>

    </div>
    <!-- By ConnerT HTML & CSS Enthusiast -->
@endsection