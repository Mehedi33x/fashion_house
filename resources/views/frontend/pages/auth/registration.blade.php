@extends('frontend.master')
@section('content')
    <section class="signin-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="block text-center">
                        <a class="logo" href="index.html">
                            <img src="images/logo.png" alt="">
                        </a>
                        <h2 class="text-center">Create Your Account</h2>
                        <form class="text-left clearfix" action="{{ route('web.do.registration') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" placeholder="First Name">
                                <div class="alert-danger">
                                    {{ $errors->first('first_name') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="last_name" placeholder="Last Name">
                                <div class="alert-danger">
                                    {{ $errors->first('last_name') }}
                                </div>
                            </div>
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
                                <button type="submit" class="btn btn-main text-center">Registration</button>
                            </div>
                        </form>
                        <p class="mt-20">Already hava an account ?<a href="{{ route('web.login') }}"> Login</a></p>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
