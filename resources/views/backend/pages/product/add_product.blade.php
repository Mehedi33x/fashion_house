@extends('backend.master')
@section('content')
    <link rel="stylesheet" href="{{ url('/backend/add_form.css') }}">
    <div class="container">

        <h2>Enter Product Information</h2>

        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <div class="alert-danger">
                    {{ $errors->first('name') }}
                </div>
            </div>

            <div class="form-group">
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    @foreach ($category as $element)
                        <option value="{{ $element->id }}">{{ $element->name }}</option>
                    @endforeach
                </select>
                <div class="alert-danger">
                    {{ $errors->first('category') }}
                </div>
            </div>

            <div class="form-group">
                <label for="price">Price:</label>
                <input type="number" min="1" id="price" name="price" required>
                <div class="alert-danger">
                    {{ $errors->first('price') }}
                </div>
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="number" id="stock" min="1" name="stock" required>
                <div class="alert-danger">
                    {{ $errors->first('stock') }}
                </div>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" cols="70" rows="10"></textarea>
                <div class="alert-danger">
                    {{ $errors->first('description') }}
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
