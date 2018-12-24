@extends('layouts.app')

@section('content')
    <div class='col-lg-4 col-lg-offset-4'>
        <h1>
            <center>404<br>
                Something went wrong.
            </center>
        </h1>
        @if( Auth::check() )
            <p>
                <a href="/profile/{{Auth::user()->id}}">
                    Return to My Profile
                </a>
            </p>
        @else
        <p>
            <a href="https://report.parkwatchreport.com">
                Get back to the beginning
            </a>
        </p>
        @endif
    </div>

@endsection