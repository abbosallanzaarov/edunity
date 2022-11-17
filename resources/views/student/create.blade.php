@extends('layouts.app')
@section('content')

<h1>Student yaratish sahifasi</h1>
<div class="col-lg-12">
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Edit with button</h5>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle">Export data to Copy, CSV, Excel & Note.</h6>
            <div class="table-responsive">
                <table class="table table-striped table-bordered" id="edit-btn">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Image</th>
                        <th>Group</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>password</th>
                        <th>BTN</th>

                      </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('student.store') }}" method="post">
                            @csrf
                            @method('POST')
                            <tr>
                                <td>#</td>
                                <td><input type="text" name="fullname" class="form-control" required="required"></td>
                                <td><input type="text" name="phone" class="form-control" required="required"></td>
                                <td><input type="text" name="image" class="form-control" required="required"></td>
                                <td><input type="number" name="group_id" class="form-control" required="required"></td>
                                <td><input type="number" name="course_id" class="form-control" required="required"></td>

                                <td><input type="email" name="email" class="form-control" required="required"></td>
                                <td><input type="text" name="password" class="form-control" required="required"></td>


                                <td><button>Saqlash</button></td>
                        </form>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

@endsection
