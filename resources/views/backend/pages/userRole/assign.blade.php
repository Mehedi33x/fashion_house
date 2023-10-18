@extends('backend.master')
@section('content')
    <div class="container mt-2 ">
        <div class="row justify-content-center">
            <!-- Card 1 -->
            <div class="col-md-5 mb-4" style="font-size: 20px">
                <h2 style="font-size: 28px; margin-bottom:18px">Assign permission of : {{ $role->name }}</h2>
                {{-- <form action="{{route('assign.permission',$role->id)}}" method="post"> --}}
                <form action="{{ route('submit.role.permission', $role->id) }}" method="post">
                    @csrf
                    <div class="card">
                        {{-- <div class="card-header">Card 1</div> --}}
                        <div class="card-body">
                            <input class="form-check-input" type="checkbox" value="" id="checkbox1">
                            <label class="form-check-label" for="checkbox1">
                                Check all Permissions
                            </label>
                        </div>
                        <hr>
                        <div class="card-footer">
                            @foreach ($permissions as $permission)
                                <div class="form-check">
                                    <input name="permission[]" @if (in_array($permission->id, $assignPermission)) checked @endif
                                        class="form-check-input" type="checkbox" value="{{ $permission->id }}"
                                        id="checkbox1">
                                    <label class="form-check-label" for="checkbox1">
                                        {{ Str::ucfirst($permission->name) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <button class="btn btn-success" type="submit">Assign permission</button>
                </form>
            </div>
        </div>
    </div>
@endsection
