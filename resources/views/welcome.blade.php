@extends('layouts.app')
@section('header')
<style>
        html, body {
            height: 100vh;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        
        .links a {
            color: #fff !important;
            padding: 0 25px;
            font-size: 16px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .logo img {
            margin-top: 100px;
            width:30%;
        }
        .btn {
            background: #3498db;
            background-image: -webkit-linear-gradient(top, #3498db, #2980b9);
            background-image: -moz-linear-gradient(top, #3498db, #2980b9);
            background-image: -ms-linear-gradient(top, #3498db, #2980b9);
            background-image: -o-linear-gradient(top, #3498db, #2980b9);
            background-image: linear-gradient(to bottom, #3498db, #2980b9);
            -webkit-border-radius: 5;
            -moz-border-radius: 5;
            border-radius: 5px;
            font-family: Arial;
            color: #ffffff;
            font-size: 18px;
            padding: 12px 40px 10px 40px;
            text-decoration: none;
            margin:1rem
        }

        .btn:hover {
            background: #3cb0fd;
            background-image: -webkit-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -moz-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -ms-linear-gradient(top, #3cb0fd, #3498db);
            background-image: -o-linear-gradient(top, #3cb0fd, #3498db);
            background-image: linear-gradient(to bottom, #3cb0fd, #3498db);
            text-decoration: none;
        }
    </style>
@endsection
@section('content')

            <div class="content">

                <div class="logo">
                    <img src="/resources/assets/images/logo.png" alt="ParkWatchReport">
                </div>
                <div>
                    <a class="btn btn-primary btn-lg" href="https://r2.parkwatchreport.com/report">File a Report</a>
                </div>

                <div class="links">
                    <p>
                        <a href="https://www.parkwatchreport.com">About ParkWatchReport</a>
                    </p>
                    <div>
                        <a href="https://itunes.apple.com/WebObjects/MZStore.woa/wa/viewSoftware?id=963181263&amp;mt=8">
                            <img src="/resources/assets/images/app_store_icon.png" alt="iTunes Store icon" style="width:120px">
                        </a>
                        <a href="https://play.google.com/store/apps/details?id=com.goodbarber.parkwatchreport">
                            <img src="/resources/assets/images/android-icon1.png" alt="iTunes Store icon" style="width:120px">
                        </a>
                    </div>                    
                </div>
            </div>
        </div>
    @endsection
