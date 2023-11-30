@extends('backend.master')
@section('content')
    <div class="mt-3 ml-3 mr-3">
        <h2 style="font-size: 35px; margin-bottom:20px">Customer List</h2>
        <div>
            {{-- <a href="" class="btn btn-success" style="margin-bottom: 20px">+ Service Request</a> --}}
        </div>
        <table class="table table-bordered" style="border: 2px solid black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Contact</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($customer as $key => $data)
                    <tr>
                        <th scope="row">{{ $customer->firstitem() + $key }}</th>
                        <td>{{ $data->fullName }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->contact }}</td>
                        <td>{{ $data->address }}</td>
                        <td class="col-2">
                            <div class="btn-group">
                                <form action="{{ route('customer.edit', $data->id) }}" method="POST">
                                    @method('put')
                                    @csrf
                                    <div style="display: flex; align-items: center;">
                                        <div style="padding-right: 10px;">
                                            <select name="status" class="form-select" aria-label="Default select example">
                                                <option @if ($data->status == 'active') selected @endif value="active">
                                                    Active
                                                </option>
                                                <option @if ($data->status == 'inactive') selected @endif value="inactive">
                                                    Inactive</option>
                                            </select>
                                        </div>
                                        <div>
                                            <button type="submit"><i class="fa solid fa-circle-check"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </td>
                        <td>
                            <div class="container">
                                <div class="dropdown">
                                    <button class="btn btn-success dropdown-toggle" type="button" id="dropdownMenuButton"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="#"><i class="fas fa-edit"></i>Edit</a>
                                        <a class="dropdown-item" href="#"
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
        {{ $customer->links() }}
    </div>
@endsection
