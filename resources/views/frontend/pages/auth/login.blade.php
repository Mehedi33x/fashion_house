@extends('frontend.master')
@section('content')
    <div>
        <section class="signin-page account">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="block text-center">
                            <a class="logo" href="index.html">
                                <img src="images/logo.png" alt="">
                            </a>
                            <h2 class="text-center">Login</h2>
                            <form class="text-left clearfix" action="{{ route('web.do.login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                    <div class="alert-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <div class="alert-danger">
                                        {{ $errors->first('password') }}
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-main text-center">Login</button>
                                </div>
                            </form>
                            <p class="mt-20"><a href="{{ route('web.forget.password') }}"> Forgot your password?</a></p>
                            <p class="mt-20">New in this site ?<a href="{{ route('web.registration') }}"> Create New
                                    Account</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
