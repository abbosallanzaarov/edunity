@extends('layouts.app')
@section('content')
<div class="breadcrumbbar border">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Group</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">group</a></li>
                    <li class="breadcrumb-item"><a href="table-editable.html#">list</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h6>Group list</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Mentor</th>
                                <th>Kurs moni</th>
                                <th>Status</th>
                                <th>BTN</th>

                              </tr>
                            </thead>
                            <tbody>
                                @isset($groupEdit)
                                    <form action="{{ route('group.update',$groupEdit->id) }}" method="post">
                                        @method('PUT')
                                        @csrf
                                        <tr>
                                            <td>#</td>
                                            <td><input placeholder="Group full name" value="{{ $groupEdit->name }}" type="text" name="name" class="form-control m-0" required="required"></td>
                                            <td><input placeholder="Group's mentor"  value="{{ $groupEdit->mentor_id }}" type="number" name="mentor_id" class="form-control m-0" required="required"></td>
                                            <td><input placeholder="Group's course"  value="{{ $groupEdit->course_id }}" type="number" name="course_id" class="form-control m-0" required="required"></td>
                                            <td><input placeholder="Desription"  value="{{ $groupEdit->active }}" type="number" name="active" class="form-control m-0" required="required"></td>

                                            <td><button class="btn btn-primary">Update</button></td>
                                    </form>
                                @endisset
                                {{-- @if(!$studentEdit) --}}
                                <form action="{{ route('group.store') }}" method="post">
                                    @csrf
                                    @method('POST')
                                    <tr>
                                        <td>#</td>
                                        <td><input placeholder="Group full name" type="text" name="name" class="form-control m-0" required="required"></td>
                                        <td><input placeholder="Group's mentor"  type="number" name="mentor_id" class="form-control m-0" required="required"></td>
                                        <td><input placeholder="Group's course"  type="number" name="course_id" class="form-control m-0" required="required"></td>
                                        <td><input placeholder="Desription"  type="number" name="active" class="form-control m-0" required="required"></td>


                                        <td><button class="btn btn-primary">Create</button></td>
                                </form>
                                {{-- @endif --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Hamma kurslar ro'yxati</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive form-control">
                        <table class="table table-striped table-bordered " id="edit-btn">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Mentor</th>
                                <th>Kurs nomi</th>
                                <th>status</th>
                                <th>Button</th>
                              </tr>
                            </thead>
                            <tbody>
                                @forelse($groups as $group)
                                <tr>
                                    <td  class="seconds" scope="row">{{ $group->id }}</th>
                                    <td>{{ $group->name }}</td>
                                    <td>{{ $group->mentor_id }}</td>
                                    <td>{{ $group->course_id }}</td>
                                    <td class="seconds">{{ $group->active }}</td>
                                    <td  class="d-flex align-center justify-content-around p-2">
                                        <a href="{{ route('group.edit',$group->id) }}" class="m-2 p-3"><i class="bi bi-pencil btn-success w-100 p-2" style='border-radius:5px'>Edit</i></a>
                                        <form action="{{ route('group.destroy',$group->id) }}" method="post" class="d-flex align-center ">
                                            @csrf
                                            @method('delete')
                                        <button class="btn-danger w-100 p-3 m-2"style='border-radius:5px' onclick="delet()"><i class="bi bi-trash-fill " >Delete</i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <h6>Kurs mavjud emas!</h6>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

        <!-- End col -->
    </div>
    <!-- End row -->
</div>


@endsection
