<div class="mt-3 ml-3 mr-3">
    <h2 style="font-size: 35px; margin-bottom:20px">Payment List</h2>
    <div>
        {{-- <a href="" class="btn btn-success" style="margin-bottom: 20px">+ Service Request</a> --}}
    </div>
    <table class="table table-bordered" style="border: 2px solid black">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Transiction ID</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Car Registration No</th>
                <th scope="col">Total Amount</th>
                <th scope="col">Due</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>dxvd</td>
                <td>dxvd</td>
                <td>dxvd</td>
                <td>dxvd</td>
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

        </tbody>
    </table>
</div>
