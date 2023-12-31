@extends('frontend.master')
@section('content')
    <section class="user-dashboard page-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        {{-- <li><a href="dashboard.html">Dashboard</a></li>
                        <li><a href="order.html">Orders</a></li>
                        <li><a href="address.html">Address</a></li> --}}
                        <li><a class="active" href="profile-details.html">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="media">
                            <div class="pull-left text-center" href="#!">
                                <img style="height:150px;width: 150px" class="media-object user-img"
                                    src="{{ url('uploads/customer', auth('customer')->user()->image) }}">
                                {{-- <a href="#x" class="btn btn-transparent mt-20">Change Image</a> --}}
                            </div>
                            <div class="media-body">
                                <ul class="user-profile-list">
                                    <li><a href="{{ route('web.profile.edit') }}" class="btn btn-success">Edit Profile</a>
                                    </li><br>
                                    <li><span>Full Name:</span>{{ auth('customer')->user('customer')->FullName }}</li>
                                    <li><span>Email:</span>{{ auth('customer')?->user()?->email }}</li>
                                    <li><span>Phone:</span>{{ auth('customer')?->user()?->contact }}</li>
                                    <li><span>Address:</span>{{ auth('customer')?->user()?->address }}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
