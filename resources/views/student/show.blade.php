@extends('layouts.app')
@section('content')

<div class="row mt-4">
    <div class="col-12 flex-column">
      <div class="card mb-4 ">
        <div class="user-profile-header d-flex flex-column flex-sm-row text-sm-start text-center mb-4">
          <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
            <img src="{{asset($student->image)}}" alt="{{$student->full_name}}" class=" h-auto ms-0 ms-sm-4 rounded user-profile-img " style="width:300px; ">
          </div>
          <div class="flex-grow-1 mt-3 mt-sm-5 ">
            <div class="d-flex  align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-4 flex-md-row flex-column gap-4">
              <div class="user-profile-info ">
                <h4>{{$student->full_name}}</h4>
                <ul class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-2">
                  <li class="list-inline-item fw-semibold">
                    <i class="bx bx-pen"></i> {{$student->phone}}
                  </li>
                  <li class="list-inline-item fw-semibold">
                    <i class="bx bx-calendar-alt"></i> {{$student->birthday}}
                  </li>
                  <li class="list-inline-item fw-semibold">
                    <i class='bx bx-envelope' ></i>
                     {{$student->email}}
                  </li>
                  <li class="list-inline-item fw-semibold">
                    <i class='bx bxs-key'></i>
                    {{$student->password}}
                  </li>
                  <li class="list-inline-item fw-semibold">
                    <i class='bx bxs-user-account'></i> {{$student->group_id}}</li>
                </ul>
              </div>
              <a href="{{route('student.edit',$student->id)}}" class="btn btn-primary text-nowrap">
                <i class="bx bx-user-check"></i> Update
              </a>
              <form action="{{route('student.destroy', $student->id)}}" method="post"  class="btn btn-danger text-nowrap">
                @csrf
                @method('delete')
                <button style="border: none" class="bx bx-user-check bg-danger">Delete</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
