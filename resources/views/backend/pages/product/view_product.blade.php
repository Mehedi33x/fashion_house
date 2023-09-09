@extends('backend.master')
@section('content')
    <link rel="stylesheet" href="{{ url('/backend/view_data.css') }}">
    <div class="container">
        <h2 class="mb-3" style="text-align: center">Product Information</h2>
        <hr>
        <div class="data-item">
            <span class="data-label">Image:</span>
            <span class="data-value">
                <img style="height: 150px;width:150px" src="{{ url('/uploads/product/', $product->image) }}" alt=""
                    srcset="">
            </span>
        </div> <br>
        <div class="data-item">
            <span class="data-label">Name:</span>
            <span class="data-value text-capitalize">{{ $product->name }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Category:</span>
            <span class="data-value ">{{ $product->category }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Price:</span>
            <span class="data-value text-capitalize">{{ $product->price }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Stock:</span>
            <span class="data-value text-capitalize">{{ $product->stock }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Status:</span>
            <span class="data-value text-capitalize">{{ $product->status }}</span>
        </div>
    </div>
@endsection
