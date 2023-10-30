@extends('backend.master')
@section('content')
    <div class="">
        <h2 style="font-size: 35px; margin-bottom:20px">Product List</h2>
        <hr>
        <div>

            <a href="{{ route('product.add') }}" class="btn btn-success" style="margin-bottom: 20px">+ Product</a>
        </div>
        <table class="table table-bordered" style="border: 2px solid black">
            <thead class="productTable">
                <tr>
                    <th scope="col">#</th>
                    {{-- <th scope="col">Image</th> --}}
                    <th scope="col">Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Price</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
@endsection

@push('ajaxjs')
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript">
        $(function() {

            var table = $('.productTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('product.yajratable') }}",
                columns: [
                    // database clm name || view clm name
                    {
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'category_id',
                        name: 'category_id'
                    },
                    {
                        data: 'price',
                        name: 'price'
                    },
                    {
                        data: 'stock',
                        name: 'stock'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'description',
                        name: 'description'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        }); <
        /script>
    @endpush
