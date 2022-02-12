
@extends('front.master')

@section('content')
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Manage <b>Employees</b></h2>
                    </div>
                    <div class="col-sm-6">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Add New Employee</span></a>
                        <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete All Data</span></a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
                    </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>
							<span class="custom-checkbox">
								<input type="checkbox" id="checkbox1" name="options[]" value="1">
								<label for="checkbox1"></label>
							</span>
                    </td>
                    <td>{{$employee->name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->address}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>
                        <a href="#" class="edit showModal" data-toggle="modal" data-id="{{$employee->id}}" data-target="#editEmployeeModal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                        <a href="{{route('delete-employee',['id'=>$employee->id])}}" onclick="return confirm('Are you sure?')" class="delete showDeleteModal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="clearfix">
                <div class="hint-text">Showing <b>5</b> out of <b>25</b> entries</div>
                <ul class="pagination">
                    <li class="page-item disabled"><a href="#">Previous</a></li>
                    <li class="page-item"><a href="#" class="page-link">1</a></li>
                    <li class="page-item"><a href="#" class="page-link">2</a></li>
                    <li class="page-item active"><a href="#" class="page-link">3</a></li>
                    <li class="page-item"><a href="#" class="page-link">4</a></li>
                    <li class="page-item"><a href="#" class="page-link">5</a></li>
                    <li class="page-item"><a href="#" class="page-link">Next</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection
@section('customJs')
    <script>
        $(document).on('click', '.showModal', function (){
            var employeeId = $(this).data('id');

            $.ajax({
                url: "{{ url('/edit-employee-info') }}",
                dataType: "JSON",
                method: "GET",
                data: {id:employeeId},
                success: function (data){

                    $('#name').val(data.name);
                    $('#email').val(data.email);
                    $('#address').val(data.address);
                    $('#phone').val(data.phone);
                    $('#emp_id').val(employeeId);


                },
                error: function (res)
                {
                    console.log(res);
                }
            })
        })
    </script>

@endsection