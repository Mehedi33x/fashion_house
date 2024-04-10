@extends('backend.master')
@section('content')
    <link rel="stylesheet" href="{{ url('/backend/add_form.css') }}">
    <div class="container">

        <h2>Enter Category Information</h2>

        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="{{ $category->name }}" required>
                <div class="alert-danger">
                    {{ $errors->first('name') }}
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                {{-- <input type="text" id="description" name="description" required> --}}
                <textarea name="description" id="description" cols="70" rows="10">{{ $category->description }}</textarea>
                <div class="alert-danger">
                    {{ $errors->first('description') }}
                </div>
            </div>

            <div class="form-group">
                <label for="status">Availablity Status:</label>
                <select id="status" name="status" required>
                    <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                    <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                </select>
            </div>

            <div class="form-group">
                <label for="image">Image:</label>
                <img style="width:100px;height:100px" src="{{ url('/uploads/category', $category->image) }}" alt=""
                    srcset="">
                <input type="file" id="image" name="image">
            </div>
            <div class="form-group">
                <input type="submit" value="Submit">
            </div>

        </form>

    </div>
@endsection
