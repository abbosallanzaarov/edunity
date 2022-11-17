@extends('layouts.app')
@section('content')
    <div class="contentbar">
        <div class="bs-stepper-content">
            <form method="POST" action="{{ route('student.store') }}" id="wizard-validation-form" enctype="multipart/form-data">
                @csrf
                {{-- create form  --}}
                <div id="account-details-validation"
                    class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="content-header mb-3">
                        <h6 class="mb-0 mt-3">Student Yarating Iltimos Ro'yxatni To'gri va Aniq Kiriting </h6>
                        <small>Pastdagi ustunlarni to'ldiring.</small>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Ism va Fam..</label>
                            <input type="text" name="full_name" id="formValidationUsername"
                                value="{{ old('full_name') }}"
                                class="form-control mb-3 @error('title') is-invalid @enderror"
                                placeholder="misol:: Abbos Allanazarov">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Telefon Ra..</label>
                            <input type="number" name="phone" id="formValidationUsername" value="{{ old('full_name') }}"
                                class="form-control mb-3 @error('title') is-invalid @enderror" placeholder=" +998 9999999">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Rasm</label>
                            <input type="file" name="image" id="formValidationUsername" value="{{ old('full_name') }}"
                                class="form-control mb-3 @error('title') is-invalid @enderror" placeholder=" image">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Guruhni Tanlang</label>
                            <select name="group_id" class="form-select">
                                <option>Guruhni Tanlang</option>
                                @forelse ($team as $team)
                                    <option value="{{ $team->id }}">{{ $team->name }}</option>
                                @empty
                                    <option value="0">Guruh yoq</option>
                                @endforelse
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Kursni Tanlang</label>
                            <select name="course_id" class="form-select">
                                @forelse ($course as $course)
                                    <option> Kursni Tanlang</option>
                                    <option value="{{ $course->id }}">{{ $course->full_name }}</option>
                                @empty
                                    <option value="0">Kurslar yoq</option>
                                @endforelse
                            </select>
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Email</label>
                            <input type="email" name="email" id="formValidationUsername" value="{{ old('email') }}"
                                class="form-control mb-3 @error('email') is-invalid @enderror" placeholder=" email">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                        </div>
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Password</label>
                            <input type="password" name="password" id="formValidationUsername" value="{{ old('password') }}"
                                class="form-control mb-3 @error('password') is-invalid @enderror" placeholder="******">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-primary btn-next my-2">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Yaratish</span>
                                <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                            </button>

                        </div>
            </form>

            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>



        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h5 class="card-title">Hamma studentlar ro'yxati</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive form-control">
                            <table class="table table-striped table-bordered" id="edit-click">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Image</th>
                                        <th>Guruh</th>
                                        <th>Kurs</th>
                                        <th>Email ID</th>
                                        <th>Phone</th>
                                        <th>Amallar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($students as $student)
                                        <tr>
                                            <td> {{ $student->id }} </td>
                                            <td> {{ $student->full_name }} </td>
                                            <td> {{ $student->phone }} </td>
                                            <td> {{ $student->image }} </td>
                                            <td> {{ $student->group_id }} </td>
                                            <td> {{ $student->course_id }} </td>
                                            <td> {{ $student->email }} </td>
                                            <td> {{ $student->password }} </td>
                                            <td class="d-flex">
                                                <form action="{{ route('student.destroy', $student->id) }}" method="post">
                                                    @method('DELETE')
                                                    @csrf

                                                    <button class="btn btn-label-danger mt-2 m-2">
                                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAShJREFUSEu1lWt1AjEQhT8UgAPAQSWAAsABEooCWgc4AAk4ABwgoXVAFcC5nE3PELJkdsPOv33kfvNIbnp0HL2O9bGACbAFRoXQH2AF7KVjARegXygelgsyjgHXN4kHmXvytoI6wDfwmajuD9gA65rEXACJfwEfwNFAJK6ZnavvKYgLoLlMK6EAUcJBXO8OwCBRhQugdTFE75T5K/H/9ntmEEP0nBNvDLA9DwA7k9Sc3S2y4srctugVxAWIxTVQRTz41AF1AXTcF4me28Hrn1nJLpKAtmW8FQVRi+YlB63EPZ5a9E6z+w2uHNv1DhiWpA1IfFm178HsUropA5Q/yeRUcTZyN5oFnCpXlU24wwPQWZCjKuvGkQNoi+ou0A3VKnKAVqJ2UeeAG+d9SRmOiS4YAAAAAElFTkSuQmCC"/>
                                                        <span class="align-middle">O'chirish</span>
                                                    </button>
                                                </form>

                                                <a href="{{ route('student.edit', $student->id) }}" class="btn btn-label-primary mt-2 m-2 text-white">
                                                    {{-- <i class="bx bx-x"></i> --}}
                                                    <img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAN1JREFUSEvFlO0NwjAMBa8bwCQwAkzCKjACE8EIsAkbgJ6USKEkdj5a0T+V2vQufnY6sfI1rcxnRLABToDuV+CV22yvQNAbsA/QB3DMSXoEKfwZBDsgK2kVzOGHILgDklyAcxpVi6AUi3gxrm6BFYsE6oXiUkVfza6pwItFgixcLzxBDq4dlp7/TKolGIZbFSwCLwkWg5cEOjCa6bRx1ZnPm5DrwTss2oaR64aXKogCyYfgniCttjjn3u/eiih+2w2vOWjeBt333kl2Ad6Cmog8hjmZfxG07thcv3oPPg35Shmq75wnAAAAAElFTkSuQmCC"/>
                                                    Tahrirlash
                                                </a>
                                            </td>
                                        </tr>
                                    @empty

                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>



    </div>
@endsection
