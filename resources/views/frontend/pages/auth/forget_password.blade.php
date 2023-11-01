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
                            <h2 class="text-center">Forget Password</h2>
                            <form class="text-left clearfix" action="{{ route('web.forget.password.link') }}"
                                method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" class="form-control" name="email" placeholder="Email">
                                    {{-- <div class="alert-danger">
                                        {{ $errors->first('email') }}
                                    </div> --}}
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-main text-center">Send Link</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
