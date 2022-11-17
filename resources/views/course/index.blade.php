@extends('layouts.app')
@section('content')


<div class="contentbar">
    <!-- Start row -->
    <div id="wizard-validation" class="bs-stepper mt-2 linear">

        <div class="bs-stepper-content">
          <form method="POST" action="{{route('course.store')}}" id="wizard-validation-form">
            @csrf
         {{-- create form  --}}
            <div id="account-details-validation" class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
              <div class="content-header mb-3">
                <h6 class="mb-0">Kurs Yarating</h6>
                <small>Pastdagi ustunlarni to'ldiring.</small>
              </div>
              <div class="row g-3">
                <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                  <label class="form-label" for="formValidationUsername">Kurs Nomi</label>
                  <input type="text" name="full_name" id="formValidationUsername" value="{{old('full_name')}}" class="form-control @error('title') is-invalid @enderror" placeholder="misol:: Matematika">
                  <div class="fv-plugins-message-container invalid-feedback">

                </div></div>
                <div class="fv-plugins-message-container invalid-feedback"></div></div>
                <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                  <label class="form-label" for="formValidationEmail">Summa</label>
                  <input type="string" name="salary" id="formValidationEmail" class="form-control  @error('title') is-invalid @enderror" value="{{old('salary')}}" placeholder="1000000" aria-label="">
                <div class="fv-plugins-message-container invalid-feedback">



            </div></div>
                <div class="col-sm-6 form-password-toggle fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                  <label class="form-label" for="formValidationPass">Qisqacha Izoh (Majburi Emas)</label>
                  <div class="input-group input-group-merge has-validation">
                    <input type="text" id="formValidationPass" name="description" class="form-control" placeholder="TEXT" aria-describedby="formValidationPass2">

                  </div><div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="col-12 d-flex justify-content-between">
                    <button class="btn btn-primary btn-next my-2">
                        <span class="align-middle d-sm-inline-block d-none me-sm-1">Yaratish</span>
                        <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                      </button>

                </div>
              </div>
            </div>
            <!-- Personal Info -->

          </form>
        </div>
      </div>
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h6>
                        Kurslar Soni
                        <h5 class="text-primary ">{{$course_count}}</h5>
                        @if ($message = Session::get('saccess'))
                        <h6 class="text-primary ">{{$message}}</h6>
                        @endif
                        @if ($message = Session::get('update_success'))
                        <h6 class="text-primary "> {{$message}}</h6>
                        @endif
                        @if ($message = Session::get('deleteCourse'))
                        <h6 class="text-primary "> {{$message}}</h6>
                        @endif
                    </h6>
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
                        <table class="table">
                            <thead>
                              <tr>
                                <th>Kurs N...</th>
                                <th>Summasi</th>
                                <th>Izoh</th>
                                <th>Actions</th>
                              </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @forelse ($courses as $course )

                                        <td> <strong>{{$course->full_name}}</strong></td>
                                        <td>{{$course->salary}}</td>

                                        <td>{{$course->description}}</td>
                                        <td>
                                          <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                            <div class="dropdown-menu">
                                              <a class="dropdown-item" href="{{route('course.edit' , $course->id)}}"><i class="bx bx-edit-alt me-1"></i> Tahrirlash</a>
                                              <form action="{{route('course.destroy' , $course->id)}}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item"><i class="bx bx-trash me-1"></i> O'chirish</button>
                                              </form>
                                            </div>
                                          </div>
                                        </td>
                                      </tr>


                                @empty
                                <h1>kurs mavjud emas</h1>
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
