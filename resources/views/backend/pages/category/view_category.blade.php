@extends('backend.master')
@section('content')
    <link rel="stylesheet" href="{{ url('/backend/view_data.css') }}">
    <div class="container">
        <h2 class="mb-3" style="text-align: center">Catgory Information</h2>
        <hr>
        <div class="data-item">
            <span class="data-label">Image:</span>
            <span class="data-value"></span>
        </div>
        <div class="data-item">
            <span class="data-label">Name:</span>
            <span class="data-value text-capitalize">{{ $category->name }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Description:</span>
            <span class="data-value ">{{ $category->description }}</span>
        </div>
        <div class="data-item">
            <span class="data-label">Status:</span>
            <span class="data-value text-capitalize">{{ $category->status }}</span>
        </div>
    </div>
@endsection
