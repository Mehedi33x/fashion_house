@extends('backend.master')
@section('content')
    <div class="">
        <h2 style="font-size: 35px; margin-bottom:20px">Category List</h2>
        <hr>
        <div>
            <a href="" class="btn btn-success" style="margin-bottom: 20px">+ Category</a>
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

                <tr>
                    <th scope="row"></th>
                    <td>
                        <img style="height: 100px;width:100px;" src="" alt="">
                    </td>
                    <td></td>
                    <td></td>
                    <td class="text-capitalize"></td>
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

            </tbody>
        </table>
        <br>
    </div>
@endsection
