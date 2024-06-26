@extends('backend.master')
@section('content')
    <link rel="stylesheet" href="{{ url('/backend/add_form.css') }}">
    <div class="container">

        <h2>Enter Category Information</h2>

        <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                <div class="alert-danger">
                    {{ $errors->first('name') }}
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                {{-- <input type="text" id="description" name="description" required> --}}
                <textarea name="description" id="description" cols="70" rows="10"></textarea>
                <div class="alert-danger">
                    {{ $errors->first('description') }}
                </div>
            </div>

            {{-- <div class="form-group">
                    <label for="status">Availablity Status:</label>
                    <select id="status" name="status" required>
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div> --}}

            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" id="image" name="image">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>

        </form>

    </div>
@endsection
