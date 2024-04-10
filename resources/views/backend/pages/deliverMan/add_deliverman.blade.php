@extends('backend.master')
@section('content')
    <link rel="stylesheet" href="{{ url('/backend/add_form.css') }}">
    <div class="container">

        <h2>Enter Product Information</h2>

        <form action="{{ route('deliverman.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <div class="alert-danger">
                    {{ $errors->first('name') }}
                </div>
            </div>
        
            <div class="form-group">
                <label for="role_id">User Role:</label>
                <select id="role_id" name="role_id" required>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="contact">Contact:</label>
                <input type="tel" id="contact" name="contact" required>
                <div class="alert-danger">
                    {{ $errors->first('contact') }}
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <div class="alert-danger">
                    {{ $errors->first('email') }}
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" required>
                <div class="alert-danger">
                    {{ $errors->first('address') }}
                </div>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
                <div class="alert-danger">
                    {{ $errors->first('image') }}
                </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>

        </form>

    </div>
@endsection
