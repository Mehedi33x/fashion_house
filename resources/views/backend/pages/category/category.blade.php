@extends('backend.master')
@section('content')
    <div class="">
        <h2 style="font-size: 35px; margin-bottom:20px">Category List</h2>
        <hr>
        <div>
            <a href="{{ route('category.add') }}" class="btn btn-success" style="margin-bottom: 20px">+ Category</a>
        </div>
        <table class="table table-bordered" style="border: 2px solid black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $key => $element)
                    <tr>
                        <th scope="row">{{ $category->firstitem() + $key }}</th>
                        <td>
                            <img style="height: 80px;width:80px;" src="{{ url('/uploads/category', $element->image) }}"
                                alt="">
                        </td>
                        <td>{{ $element->name }}</td>
                        <td>{{ $element->description }}</td>
                        <td class="text-capitalize">{{ $element->status }}</td>
                        <td>
                            <div class="container">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">

                                        <a class="dropdown-item" href="{{ route('category.view', $element->id) }}">View</a>
                                        <a class="dropdown-item" href="{{ route('category.edit', $element->id) }}">Edit</a>
                                        <a class="dropdown-item" href="{{ route('category.delete', $element->id) }}"
                                            onclick="return confirm('Are you sure to Delete?')"><i
                                                class="fa-solid fa-trash"></i>Delete</a>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        {{ $category->links() }}
    </div>
@endsection
