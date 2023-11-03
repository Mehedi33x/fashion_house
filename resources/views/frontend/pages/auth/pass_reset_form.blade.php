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
                            <h2 class="text-center">Enter New Password</h2>
                            <form class="text-left clearfix" action="{{ route('web.reset.pass', $token) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                    <div class="alert-danger">
                                        {{ $errors->first('password') }}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <input type="password" class="form-control" name="password_confirmation"
                                        placeholder="Confirm Password">
                                    <div class="alert-danger">
                                        {{ $errors->first('password_confirmation') }}
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-main text-center">Reset Password</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
