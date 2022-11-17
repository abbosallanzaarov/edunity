@extends('layouts.app')
@section('content')

<div class="bs-stepper-content">
    <form  action="{{route('team.update', $team->id)}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
   {{-- create form  --}}
      <div id="account-details-validation" class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
        <div class="content-header mb-3">
          <h6 class="mb-0 mt-3">Guruhni Tahrirlang</h6>
          <small>Pastdagi ustunlarni o'zgartiring.</small>
        </div>
        <div class="row g-3">
          <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
            <label class="form-label" for="formValidationUsername">Guruh Nomi</label>
            <input type="text" name="name" id="formValidationUsername" value="{{$team->name}}" class="form-control @error('title') is-invalid @enderror" placeholder="misol:: Matematika">
            <div class="fv-plugins-message-container invalid-feedback">
              @error('name')
              <div data-field="formValidationEmail" data-validator="notEmpty">{{$message}}</div>
              @enderror
          </div></div>
          <div class="fv-plugins-message-container invalid-feedback"></div></div>
          <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
            O'qituvchi Tanlang
            <select name="mentor_id" value="{{$team->mentor_id}}"  class="form-select mt-2" >
                <option selected>O'qituvchi tanlang</option>
                @forelse ($mentor as $mentor )
                <option value="{{$mentor->id}}">{{$mentor->full_name}}</option>
                @empty
                <option value="{{$team->mentor_id}}"></option>
                @endforelse
              </select>
          <div class="fv-plugins-message-container invalid-feedback">
              @error('mentor_id')
              <div data-field="formValidationEmail" data-validator="notEmpty">{{$message}}</div>
              @enderror


      </div></div>

          <div class="col-sm-6 form-password-toggle fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
            Kursni Tanlang
            <select name="course_id" class="form-select mt-3" >
                @forelse ($course as $course )
                <option value="{{$course->id}}">{{$course->full_name}}</option>
                @empty
                <option value="{{$team->corse_id}}"></option>
                @endforelse
              </select>


            </div><div class="fv-plugins-message-container invalid-feedback"></div>
          </div>
          <div class="col-12 d-flex justify-content-between">
              <button type="submit" class="btn btn-primary btn-next my-2">
                  <span class="align-middle d-sm-inline-block d-none me-sm-1">Tahrirlash</span>
                  <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                </button>

          </div>
        </div>
      </div>
      <!-- Personal Info -->

    </form>
  </div>

@endsection
