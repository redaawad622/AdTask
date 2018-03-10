@extends('Layout.master')
@section('content')

    <div class="wrapper">
        <span class="menu"></span>

        <div class="container">
            @yield('nav')
        </div>

        <div class="overlay">
            <ul>
                <li><a href="#">Home</a></li>
                @auth()
                <li><a href="/logout">Logout</a></li>
                @endauth

            </ul>
        </div>

    </div>



@endsection

@push('styles')

    <link rel="stylesheet" href="css/lists.css">

@endpush

@push('scripts')

    <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
    <script src='js/lists.js'></script>

@endpush
