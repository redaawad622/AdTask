@extends('Layout.master')
@section('content')

    <header class="header">
        <div class="container">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><span style="color: #6fda44;">T</span>ask</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/lists">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/lists/create">Add List</a>
                    </li>

                </ul>

                <ul class="navbar-nav my-2">

                <li class="nav-item">
                    <a class="nav-link" href="/logout">Logout</a>
                </li>

                </ul>

            </div>
        </nav>
        </div>
    </header>

        <div class="allList">
            <div class="container">
              @yield('nav')
            </div>
        </div>







@endsection

@push('styles')

    <link rel="stylesheet" href="{{asset('css/lists.css')}}">

@endpush

@push('scripts')

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>

    <script src='{{asset('js/lists.js')}}'></script>

    @if (Session::has('sweet_alert.alert'))
        <script>
            $(document).read(function () {

                swal({
                    title:"{!! Session::get('sweet_alert.title') !!}",
                    text: "{!! Session::get('sweet_alert.text') !!}",
                    icon: "success",
                });

                swal({
                    title: "Good job!",
                    text: "You clicked the button!",
                    icon: "success",
                    button: "Aww yiss!",
                });
            });

        </script>

    @endif


@endpush
