@extends('layouts.app')
@section('content')
<div class="contentbar">
    <div class="bs-stepper-content">
        <form method="POST" action="{{ route('student.update',$student->id) }}" id="wizard-validation-form" enctype="multipart/form-data">
            @csrf
            @method('patch')
            {{-- create form  --}}
            <div id="account-details-validation"
                class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
                <div class="content-header mb-3">
                    <h6 class="mb-0 mt-3">Studentni Tahrirlash </h6>
                    <small>Pastdagi ustunlarni oi'zgartiring.</small>
                    @if($message = Session::get('error_email'))
                    <h6 class="text-success">{{$message }}</h6>
                    @endif
                    @if($message = Session::get('student_create'))
                    <h6 class="text-success"> {{$message }}</h6>
                    <span class="text-success">&#10003; ok</span>
                    @endif
                    @if($message = Session::get('student_error'))
                    <i class="bi bi-check"></i>
                    <h6 class="text-success">{{$message }}</h6>
                    @endif
                </div>
                <div class="row g-3">
                    <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="form-label" for="formValidationUsername">Ism va Fam..</label>
                        <input type="text" value="{{$student->full_name}}" name="full_name" id="formValidationUsername"
                            class="form-control mb-3 @error('full_name') is-invalid @enderror"
                            placeholder="misol:: Abbos Allanazarov">
                        <div class="fv-plugins-message-container invalid-feedback">
                        </div>
                        @error('full_name')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="form-label" for="formValidationUsername">Tugilgan Sana</label>
                        <input type="text" value="{{$student->birthday}}" name="birthday" id="formValidationUsername"
                            class="form-control mb-3 @error('birthday') is-invalid @enderror"
                            placeholder="misol:: Abbos Allanazarov">
                        <div class="fv-plugins-message-container invalid-feedback">
                        </div>
                        @error('birthday')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="form-label" for="formValidationUsername">Telefon Ra..</label>
                        <input type="number" name="phone" value="{{$student->phone}}" id="formValidationUsername"
                            class="form-control mb-3 @error('phone') is-invalid @enderror" placeholder=" +998 9999999">
                        <div class="fv-plugins-message-container invalid-feedback">
                        </div>
                        @error('phone')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="form-label" for="formValidationUsername">Rasm</label>
                        <input type="file" value="{{$student->image}}" name="image" id="formValidationUsername"
                            class="form-control mb-3 @error('image') is-invalid @enderror" placeholder=" image">
                        <div class="fv-plugins-message-container invalid-feedback">
                        </div>
                        @error('image')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="form-label" for="formValidationUsername">Guruhni Tanlang</label>
                        <select name="group_id" value="{{$student->group_id}}" class="form-select  @error('group_id') is-invalid @enderror">
                            <optgroup style="color: wheat">ss</optgroup>
                            @forelse ($team as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @empty
                                <option value="0">Guruh yoq</option>
                            @endforelse
                        </select>
                        @error('group_id')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                        <div class="fv-plugins-message-container invalid-feedback">
                        </div>
                    </div>
                    <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="form-label" for="formValidationUsername">Kursni Tanlang</label>
                        <select name="course_id"value=" {{$student->course_id}}" class="form-select  @error('course_id') is-invalid @enderror">
                            @forelse ($course as $course)
                            <optgroup style="color: wheat">ss</optgroup>
                                <option value="{{ $course->id }}">{{ $course->full_name }}</option>
                            @empty
                                <option value="0">Kurslar yoq</option>
                            @endforelse
                        </select>
                        @error('course_id')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                        <div class="fv-plugins-message-container invalid-feedback">
                        </div>
                    </div>
                    <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="form-label" for="formValidationUsername">Email</label>
                        <input type="email" value="{{$student->email}}" name="email" id="formValidationUsername"
                            class="form-control mb-3 @error('email') is-invalid @enderror" placeholder=" email">
                        <div class="fv-plugins-message-container invalid-feedback">
                        </div>
                        @error('email')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="form-label" for="formValidationUsername">Password</label>
                        <input type="password" value="{{$student->password}}" name="password" id="formValidationUsername"
                            class="form-control mb-3 @error('password') is-invalid @enderror" placeholder="******">
                        <div class="fv-plugins-message-container invalid-feedback">
                        </div>
                        @error('password')
                        <p class="help-block text-danger">{{ $message }}</p>
                    @enderror
                    </div>
                    <div class="col-12 d-flex justify-content-between">
                        <button class="btn btn-primary btn-next my-2">
                            <span class="align-middle d-sm-inline-block d-none me-sm-1">Tahrirlash</span>
                            <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>

                        </button>

                    </div>
        </form>

        <div class="fv-plugins-message-container invalid-feedback"></div>
    </div>
</div>

@endsection
