@extends('backend.master')
@section('content')
    <link rel="stylesheet" href="{{ url('/backend/add_form.css') }}">
    <div class="container">

        <h2>Enter Sub-Category Information</h2>

        <form action="{{ route('subCat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
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

            <div class="form-group">
                <label for="category_id">Category:</label>
                <select id="category_id" name="category_id" required>
                    @foreach ($category as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>

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
