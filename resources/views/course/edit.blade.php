@extends('layouts.app')
@section('content')
    <div class="bs-stepper-content">
        <form action="{{ route('course.update', $course->id) }}" method="post" enctype="multipart/form-data">
            @method('put')
            @csrf
            {{-- create form  --}}
            <div id="account-details-validation"
                class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
                <div class="content-header mb-3">
                    <h6 class="mb-0">Kurs Tahrirlang</h6>
                    <small>Pastdagi ustunlarni o'zgartiring.</small>
                </div>
                <div class="row g-3">
                    <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                        <label class="form-label" for="formValidationUsername">Kurs Nomi</label>
                        <input type="text" name="full_name" id="formValidationUsername" value="{{ $course->full_name }}"
                            class="form-control @error('title') is-invalid @enderror" placeholder="misol:: Matematika">
                        <div class="fv-plugins-message-container invalid-feedback">
                            @error('full_name')
                                <div data-field="formValidationEmail" data-validator="notEmpty">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
                </div>
                <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                    <label class="form-label" for="formValidationEmail">Summa</label>
                    <input type="string" name="salary" id="formValidationEmail"
                        class="form-control  @error('title') is-invalid @enderror" value="{{ $course->salary }}"
                        placeholder="1000000" aria-label="">
                    <div class="fv-plugins-message-container invalid-feedback">
                        @error('salary')
                            <div data-field="formValidationEmail" data-validator="notEmpty">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-sm-6 form-password-toggle fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                    <label class="form-label" for="formValidationPass">Qisqacha Izoh (Majburi Emas)</label>
                    <div class="input-group input-group-merge has-validation">
                        <input type="text" value="{{ $course->description }}" id="formValidationPass" name="description"
                            class="form-control" placeholder="TEXT" aria-describedby="formValidationPass2">
                    </div>
                    <div class="fv-plugins-message-container invalid-feedback"></div>
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
