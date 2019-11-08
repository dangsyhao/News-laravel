@extends('admin.app')
@section('content')
    <div class="container">
        @if(isset($customer_info))
            @foreach($customer_info as $row)
                <div class="row">
                    <div class="col-md-12">
                        <h4>Customer Infomations:</h4>
                        <p>
                            {{$row->info}}
                        </p>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection 