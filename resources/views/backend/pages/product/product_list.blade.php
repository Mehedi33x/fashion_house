@extends('backend.master')
@section('content')
    <div class="">
        <h2 style="font-size: 35px; margin-bottom:20px">Product List</h2>
        <hr>
        <div>
            <a href="{{ route('product.add') }}" class="btn btn-success" style="margin-bottom: 20px">+ Product</a>
        </div>
        <table class="table table-bordered" style="border: 2px solid black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $key => $element)
                    <tr>
                        <th scope="row">{{ $product->firstitem() + $key }}</th>
                        <td>
                            <img style="width: 80px;height:80px;" src="{{ url('/uploads/product', $element->image) }}"
                                alt="">
                        </td>
                        <td>{{ $element->name }}</td>
                        <td>{{ $element->catData->name }}</td>
                        <td>{{ $element->price }} BDT</td>
                        <td>{{ $element->stock }} units</td>
                        <td class="text-capitalize">{{ $element->status }}</td>

                        <td>
                            <div class="container">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="{{ route('product.view', $element->id) }}"><i
                                                class="fa fa-edit"></i>View</a>
                                        <a class="dropdown-item" href="#"><i class="fa fa-edit"></i>Edit</a>
                                        <a class="dropdown-item" href="{{ route('product.delete', $element->id) }}"
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
    </div>
@endsection
