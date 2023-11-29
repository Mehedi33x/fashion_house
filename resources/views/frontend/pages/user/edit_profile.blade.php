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
                        <h2 class="text-center">Edit Your Account</h2>
                        <form class="text-left clearfix"
                            action="{{ route('web.user_profile.store', auth('customer')->user()->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" class="form-control" name="first_name"
                                    value="{{ auth('customer')?->user()?->first_name }}" placeholder="First Name">
                                <div class="alert-danger">
                                    {{ $errors->first('first_name') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" class="form-control" name="last_name"
                                    value="{{ auth('customer')?->user()?->last_name }}" placeholder="Last Name">
                                <div class="alert-danger">
                                    {{ $errors->first('last_name') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email"
                                    value="{{ auth('customer')?->user()?->email }}" placeholder="Email">
                                <div class="alert-danger">
                                    {{ $errors->first('email') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address"
                                    value="{{ auth('customer')?->user()?->address }}" placeholder="Enter address">
                                <div class="alert-danger">
                                    {{ $errors->first('address') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Contact</label>
                                <input type="tel" class="form-control" name="contact"
                                    value="{{ auth('customer')?->user()?->contact }}" placeholder="Enter contact">
                                <div class="alert-danger">
                                    {{ $errors->first('contact') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Password">
                                <div class="alert-danger">
                                    {{ $errors->first('password') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password" placeholder="Password">
                                <div class="alert-danger">
                                    {{ $errors->first('confirm_password') }}
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Your Image</label>
                                <input type="file" class="form-control" name="image" placeholder="">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-main text-center">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
