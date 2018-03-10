@extends('Layout.master')
@section('content')
<div class="main">
    <div class="form-main">
        {{old('email')}}
        {{old('password')}}
        <h2><span style="color: #4285f4">T</span><span style="color: #ea4335">a</span><span style="color: #fbbc05">s</span><span style="color:#4285f4">k</span></h2>
        <h3>Sign In </h3>
        <p class="user_name">With Your Account</p>
        <form action="/login" method="post" id="login-form">
            {{csrf_field()}}

            <div class="form-group effect-parent-email">
                <label for="exampleInputEmail1" class="input-label">Email address</label>
                <div class="input-effect">
                    <input type="email" class="effect" id="email" name="email" aria-describedby="emailHelp" placeholder="enter email" value="{{old('email')}}">
                    <span class="focus-border"></span>
                </div>
                @if (session('err'))
                    <small id="emailHelp" class="form-text text-muted invalid-text">{{ session('err') }}</small>


                    @else
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>

                @endif
            </div>
            <div class="form-group effect-parent-pass">
                <label class="input-label">Password</label>
                <div class="input-effect">
                    <input type="password" class="effect" name="password" id="password" placeholder="Password">
                    <span class="focus-border"></span>
                </div>

            </div>
            <div>
                <p>Or sign in using

            </div>
            <div class="form-footer">
                <div class="icon">
                   <a href="/login/facebook"><i class="fab fa-facebook-square fa-2x"></i></a>
                   <a href="/login/github"><i class="fab fa-github-square fa-2x"></i></a>
                </div>

                <button type="button" id="check" class="btn">Next</button>
                <button type="submit" id="send" class="btn">Sign in</button>


            </div>
            <a href="/register" class="create">Create Email</a>

        </form>

    </div>

</div>

@endsection

@push('styles')

    <link rel="stylesheet" href="{{asset('css/login.css')}}">

@endpush

@push('scripts')

    <script src="{{asset('js/login.js')}}"></script>

@endpush