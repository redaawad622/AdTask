@extends('Layout.master')
@section('content')
    <div class="main">
        <div class="form-main">

            <h2><span style="color: #4285f4">T</span><span style="color: #ea4335">a</span><span style="color: #fbbc05">s</span><span style="color:#4285f4">k</span></h2>
            <h3>Register</h3>
            <p>With Your Account</p>

            <form action="/register" method="post">
                {{csrf_field()}}
                <input type="hidden" name="provider_user_id" value="{{old('provider_user_id')}}  @isset($provider_user_id) {{$provider_user_id}} @endisset">
                <input type="hidden" name="provider" value="{{old('provider)}}  @isset($provider) {{$provider}} @endisset">

                <div class="form-group">
                    <div class="input-effect">
                        <input type="text" name="name" class="effect @if($errors->has('name')) {{'invalid'}} @endif " value="{{old('name')}} @isset($name) {{$name}} @endisset " placeholder="user name">
                        <span class="focus-border"></span>
                    </div>

                        @foreach ($errors->get('name') as $message)
                           <small  class="form-text text-muted invalid-text"> {{$message}}.</small>
                        @endforeach

                </div>
                <div class="form-group effect-parent-email">
                    <div class="input-effect">
                        <input type="email" name="email" class="effect @if($errors->has('email')) {{'invalid'}} @endif "  value="{{old('email')}} @isset($email) {{$email}} @endisset "  aria-describedby="emailHelp" placeholder="enter email">
                        <span class="focus-border"></span>
                    </div>

                    @foreach ($errors->get('email') as $message)
                        <small  class="form-text text-muted invalid-text"> {{$message}}.</small>
                    @endforeach

                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <div class="input-effect">
                        <input type="password" name="password" class="effect @if($errors->has('password')) {{'invalid'}} @endif" placeholder="Password">
                        <span class="focus-border"></span>
                    </div>
                    @foreach ($errors->get('password') as $message)
                        <small  class="form-text text-muted invalid-text"> {{$message}}.</small>
                    @endforeach

                </div>
                <div>
                    <p>Or sign in using</p>

                </div>
                <div class="form-footer">
                    <div class="icon">
                        <a href="/login/facebook"><i class="fab fa-facebook-square fa-2x"></i></a>
                        <a href="/login/github"><i class="fab fa-github-square fa-2x"></i></a>
                    </div>

                    <button type="submit" class="btn">Register</button>


                </div>
                <a href="/" class="signIn">Sign in</a>

            </form>



        </div>

    </div>


@stop
@push('styles')

    <link rel="stylesheet" href="{{asset('css/login.css')}}">

@endpush

@push('scripts')

    <script src="{{asset('js/login.js')}}"></script>

@endpush