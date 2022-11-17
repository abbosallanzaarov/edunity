@extends('layouts.app')
@section('content')

<div id="wizard-validation" class="bs-stepper mt-2 linear">

    <div class="bs-stepper-content">
      <form method="POST" action="{{route('team.store')}}" id="wizard-validation-form">
        @csrf
     {{-- create form  --}}
        <div id="account-details-validation" class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
          <div class="content-header mb-3">
            <h6 class="mb-0">Guruh Yarating</h6>
            <small>Pastdagi ustunlarni to'ldiring.</small>
          </div>
          <div class="row g-3">
            <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
              <label class="form-label" for="formValidationUsername"></label>
              <input type="text" name="name" id="formValidationUsername" value="{{old('full_name')}}" class="form-control mb-3 @error('title') is-invalid @enderror" placeholder="Guruh Nomi">
              <div class="fv-plugins-message-container invalid-feedback">

            </div>
        </div>
            <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
            <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                <select name="mentor_id"  class="form-select" >
                    <option selected>O'qituvchi tanlang</option>
                    @forelse ($mentor as $mentor )
                    <option value="{{$mentor->id}}">{{$mentor->full_name}}</option>
                    @empty
                    <option value="0">O'qituvchi Yoq</option>
                    @endforelse
                  </select>
            <div class="fv-plugins-message-container invalid-feedback">



        </div>
    </div>
            <div class="col-sm-6 form-password-toggle fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
              <label class="form-label" for="formValidationPass"></label>
              <div class="input-group input-group-merge has-validation">
                <select name="course_id" class="form-select" >
                    <option selected>Kursni Tanlang</option>
                    @forelse ($course as $course )
                    <option value="{{$course->id}}">{{$course->full_name}}</option>
                    @empty
                    <option value="0">Kurslar yoq</option>
                    @endforelse
                  </select>
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
  <div class="col-lg-12">
    <div class="card m-b-30">
        <div class="card-header">
            <h5 class="card-title">Hamma Guruhlar ro'yxati <br>
                 <span class="text-primary">Soni = {{$team_count}}</span>
                 @if ($message = Session::get('success_team')))
                 <span class="text-primary">{{$message}}</span>
                 @endif
                 @if ($message = Session::get('team_update')))
                 <span class="text-primary">{{$message}}</span>
                 @endif
                 @if ($message = Session::get('delete_team')))
                 <span class="text-primary">{{$message}}</span>
                 @endif
            </h5>
        </div>
        <div class="card-body">
            <div class="table-responsive form-control">
                <table class="table">
                    <thead>
                      <tr>
                        <th>Nomi</th>
                        <th>Oqituvchisi</th>
                        <th>Kurs</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @forelse ($teams as $team )

                                <td> <strong>{{$team->name}}</strong></td>
                                <td>{{$team->mentor_id  }}</td>

                                <td>{{$team->course_id}}</td>
                                <td>
                                  <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                                    <div class="dropdown-menu">
                                      <a class="dropdown-item" href="{{route('team.edit' , $team->id)}}"><i class="bx bx-edit-alt me-1"></i>{{$team->name}}--> Tahrirlash</a>
                                      <form action="{{route('team.destroy' , $team->id)}}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button class="dropdown-item"><i class="bx bx-trash me-1"></i> {{$team->name}}--> O'chirish</button>
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
@endsection
