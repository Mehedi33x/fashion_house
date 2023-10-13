@extends('backend.master')
@section('content')
    <div class="mt-3 ml-3 mr-3">
        <h2 style="font-size: 35px; margin-bottom:20px">User Role List</h2>
        <div>
            <a href="{{ route('add.userRole.table') }}" class="btn btn-success" style="margin-bottom: 20px">+ User Role</a>
        </div>
        <table class="table table-bordered" style="border: 2px solid black">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Role Name</th>
                    <th scope="col">Assign</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($role as $key => $item)
                    <tr>
                        {{-- <th scope="row">{{ $role->firstitem() + $key }}</th> --}}
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td>
                            <div>
                                <a href="{{ route('assign.role') }}" class="btn btn-success">Assaign</a>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{-- {{ $role->links() }} --}}
    </div>
@endsection
