@extends('layouts.app')
@section('content')
    <div class="contentbar">
        <div class="bs-stepper-content">
            <form action="{{ route('create.group.student') }}" method="POST">
                @csrf
                <input type="hidden" name="talabaniGuruhgaQoshish" value="true">
                <div class="content-header mb-3">
                    <h6 class="mb-0 mt-3">Avvaldan mavjud talabani guruhga qo'shish.</h6>
                    <small>Talabani va guruhni tanlang.</small>
                </div>
                <select name="student_id" id="" class="form-control m-2">
                    @forelse($students as $student)
                        <option value="{{ $student->id }}">{{ $student->full_name }}</option>
                    @empty
                    @endforelse
                </select>
                <select name="group_id" id="" class="form-control m-2">
                    @forelse($team as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                    @empty
                    @endforelse
                </select>
                <div class="col-12 d-flex justify-content-between">
                    <button class="btn btn-primary btn-next my-2">
                        <span class="align-middle d-sm-inline-block d-none me-sm-1">Yaratish</span>
                        <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                    </button>
                </div>
            </form>
            <hr>
            <form method="POST" action="{{ route('student.store') }}" id="wizard-validation-form" enctype="multipart/form-data">
                @csrf
                {{-- create form  --}}
                <div id="account-details-validation"
                    class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="content-header mb-3">
                        <h6 class="mb-0 mt-3">Student Yarating Iltimos Ro'yxatni To'gri va Aniq Kiriting </h6>
                        <small>Pastdagi ustunlarni to'ldiring.</small>
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
                            <input type="text" name="full_name" id="formValidationUsername"
                                value="{{ old('full_name') }}"
                                class="form-control mb-3 @error('full_name') is-invalid @enderror"
                                placeholder="Misol:: Abbos Allanazarov">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                            @error('full_name')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Tugilgan Sana</label>
                            <input type="date" name="birthday" id="formValidationUsername"
                                value="{{ old('birthday') }}"
                                class="form-control mb-3 @error('birthday') is-invalid @enderror"
                                placeholder="Misol:: Abbos Allanazarov">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                            @error('birthday')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                        </div>


                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Telefon Ra..</label>
                            <input type="number" name="phone" id="formValidationUsername" value="{{ old('phone') }}"
                                class="form-control mb-3 @error('phone') is-invalid @enderror" placeholder=" +998 9999999">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                            @error('phone')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Rasm</label>
                            <input type="file" name="image" id="formValidationUsername" value="{{ old('full_name') }}"
                                class="form-control mb-3 @error('image') is-invalid @enderror" placeholder=" image">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                            @error('image')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Guruhni Tanlang</label>
                            <select name="group_id" class="form-select  @error('group_id') is-invalid @enderror">
                                <optgroup style="color: wheat">ss</optgroup>
                                @forelse ($team as $group)
                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
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
                        {{-- <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid"> --}}
                            {{-- <label class="form-label" for="formValidationUsername">Kursni Tanlang</label>
                            <select name="course_id" class="form-select  @error('course_id') is-invalid @enderror">
                                @forelse ($course as $course)
                                <optgroup style="color: wheat">ss</optgroup>
                                    <option value="{{ $course->id }}">{{ $course->full_name }}</option>
                                @empty
                                    <option value="0">Kurslar yoq</option>
                                @endforelse
                            </select>
                            @error('course_id')
                            <p class="help-block text-danger">{{ $message }}</p>
                            @enderror --}}
                            {{-- <div class="fv-plugins-message-container invalid-feedback">
                            </div> --}}
                        {{-- </div> --}}
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Email</label>
                            <input type="email" name="email" id="formValidationUsername" value="{{ old('email') }}"
                                class="form-control mb-3 @error('email') is-invalid @enderror" placeholder=" email">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                            @error('email')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
                        </div>
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername">Password</label>
                            <input type="password" name="password" id="formValidationUsername" value="{{ old('password') }}"
                                class="form-control mb-3 @error('password') is-invalid @enderror" placeholder="******">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                            @error('password')
                            <p class="help-block text-danger">{{ $message }}</p>
                        @enderror
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
          <div class="card">
            <div class="mx-3">
                <button type="button" style="width: 10rem" class="btn btn-success text-primary fs-5 " data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Pdf
                <img class="text-primary" src="data:image/png;base64, iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAOxJREFUSEvtlv8JwjAQhb9O4gjqBLqBjqAbiAuok+gIuoEruIEuovIghbREL9dY9A8PAoVe3pfLj5dU9BxVz/qkAHNgA4wM+AFYWgNMAa7AwOoY/puQFOCRIa6R73MgXQHqt8iBlABUgAkpBZiQTwDakIZmV8C7ffAHmKfkt6ZIo5EnyZ8UR+AOrAFZiqxCtnKO6nJVoGR13gLT0IbAOBwyQXTYJiUAic+AUwCoIjUJCy5x5dThrqA2v100Rfq+BEVZexwugLllEgnfB3gunHYBmrbGTfjqytSiabd44gaswjqlV9yjlpvb+6viCShKNBln3rfLAAAAAElFTkSuQmCC"/>
                </button>
            </div>
            <h5 class="card-header">Contextual Classes</h5>
            <div class="table-responsive text-nowrap">
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Ism F..</th>
                    <th>Ko'rish</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($students as $student )
                    <tr class="table-dark">
                        <td>{{$student->full_name}}</td>
                        <td><span class="badge bg-label-success me-1">{{$student->email}}</span></td>
                        <td>
                          <div class="dropdown">
                            <a href="{{route('student.show' ,$student->id)}}" type="button" class="btn p-0 dropdown-toggle hide-arrow">Ko'rish</a>
                          </div>
                        </td>
                      </tr>
                    @empty

                    @endforelse
                </tbody>
              </table>
            </div>
          </div>
    </div>
@endsection
