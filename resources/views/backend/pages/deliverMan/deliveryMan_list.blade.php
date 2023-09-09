@extends('backend.master')
@section('content')
    <div class="">
        <h2 style="font-size: 35px; margin-bottom:20px">Delivery Man List</h2>
        <hr>
        <div>
            <a href="{{ route('deliverman.add') }}" class="btn btn-success" style="margin-bottom: 20px">+ Delivery Man</a>
        </div>
        <table class="table table-bordered" style="border: 2px solid black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                {{-- @dd($deliverMan->toArray()) --}}
                @foreach ($deliverMan as $key => $item)
                    <tr>
                        <th scope="row">{{ $deliverMan->firstitem() + $key }}</th>
                        <td>{{ $item->id_no }}</td>
                        <td>
                            <img style="height: 80px;width:80px;" src="" alt="">
                        </td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->contact }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->address }}</td>
                        <td class="text-capitalize">{{ $item->status }}</td>
                        <td>
                            <div class="container">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="">View</a>
                                        <a class="dropdown-item" href=""
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
        {{ $deliverMan->links() }}
    </div>
@endsection
