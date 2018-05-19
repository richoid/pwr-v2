<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'ParkWatchReport') }}</title>

    <!-- Styles -->
    <style>
        html, body, #app, main, .container, .card:first-child {
            width:100%;
            height:100%;
            margin:0;
        }
    </style>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

    @yield('header')
</head>
<body>
    @php
        $user = App\User::with('profiles')->find(Auth::id())
    @endphp
    <div id="app" style="">
        

        <main class="py-4">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            @yield('content')
        </main>
    </div>
    
    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}"></script>
    <script
    src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="
    crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    @yield('scripts')
</body>
</html>
