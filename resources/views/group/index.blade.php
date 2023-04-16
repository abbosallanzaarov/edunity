@extends('layouts.app')
@section('content')
    <div id="wizard-validation" class="bs-stepper mt-2 linear">
        <div class="bs-stepper-content">
            <form method="POST" action="{{ route('team.store') }}" id="wizard-validation-form" enctype="multipart/form-data">
                @csrf
                {{-- create form  --}}
                <div id="account-details-validation"
                    class="content active dstepper-block fv-plugins-bootstrap5 fv-plugins-framework">
                    <div class="content-header mb-3">
                        <h6 class="mb-0">Guruh Yarating</h6>
                        <small>Pastdagi ustunlarni to'ldiring.</small>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-valid">
                            <label class="form-label" for="formValidationUsername"></label>
                            <input type="text" name="name" id="formValidationUsername" value="{{ old('full_name') }}"
                                class="form-control mb-3 @error('title') is-invalid @enderror" placeholder="Guruh Nomi">
                            <div class="fv-plugins-message-container invalid-feedback">
                            </div>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                    <div class="col-sm-6 fv-plugins-icon-container fv-plugins-bootstrap5-row-invalid">
                        <select name="mentor_id" class="form-select">
                            <option selected>O'qituvchi tanlang</option>
                            @forelse ($mentor as $mentor)
                                <option value="{{ $mentor->id }}">{{ $mentor->full_name }}</option>
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
                            <select name="course_id" class="form-select">
                                <option selected>Kursni Tanlang</option>
                                @forelse ($course as $course)
                                    <option value="{{ $course->id }}">{{ $course->full_name }}</option>
                                @empty
                                    <option value="0">Kurslar yoq</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        <div class="col-12 d-flex justify-content-between my-3">
                            <input class="form-control" name="length" type="number" placeholder="Davomiyligi oy hisobida">
                        </div>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                        <div class="col-12 d-flex justify-content-between">
                            <button class="btn btn-primary btn-next my-2">
                                <span class="align-middle d-sm-inline-block d-none me-sm-1">Yaratish</span>
                                <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                            </button>
                        </div>
                    </div>

            </form>
        </div>
    </div>
    <div class="contentbat">
        <div class="row">
            <!-- Start col -->
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-header">
                        <h6>
                            Guruhlar Soni
                            <h5 class="text-primary ">{{ $team_count }}</h5>
                            @if ($message = Session::get('saccess'))
                                <h6 class="text-primary ">{{ $message }}</h6>
                            @endif
                            @if ($message = Session::get('update_success'))
                                <h6 class="text-primary "> {{ $message }}</h6>
                            @endif
                            @if ($message = Session::get('deleteCourse'))
                                <h6 class="text-primary "> {{ $message }}</h6>
                            @endif
                        </h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <div class="table-responsive form-control">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th> Nomi</th>
                                        <th>O'qituvchi</th>
                                        <th>Kurs</th>
                                        <th>Davomiyligi</th>
                                        <th>Status</th>
                                        <th>Amallar</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @forelse ($teams as $team)
                                        <td> <strong>{{ $team->name }}</strong></td>
                                        <td>@if ($team->mentor)
                                            {{ $team->mentor->full_name }}
                                        @else
                                            Mentor mavjud emas
                                        @endif
                                    </td>
                                        <td>{{ $team->courses_id }}</td>
                                        <td>{{ $team->length }}</td>
                                        <td>
                                            @if ($team->active == 1)
                                                <span class="badge bg-label-success me-1">Activ</span>
                                            @else
                                                <span class="badge bg-label-danger me-1"> No Activ</span>
                                            @endif
                                        </td>
                                        <td class="d-flex">
                                            <a class="dropdown-item" href="{{ route('team.active', $team->id) }}"><i class='bx bxs-flag-checkered'></i>Active</a>
                                            <a class="dropdown-item" href="{{ route('team.edit', $team->id) }}"><i
                                                    class="bx bx-edit-alt me-1"></i></a>
                                            <form action="{{ route('team.destroy', $team->id) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="dropdown-item"><i class="bx bx-trash me-1"></i> </button>
                                            </form>
                                        </td>
                                        </tr>
                                    @empty
                                        <h1>kurs mavjud emas</h1>
                                    @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card m-b-30">
                        <div class="card-header">
                            <h5 class="card-title">Hamma kurslar ro'yxati</h5>
                        </div>
                    </div>
                </div>
                <!-- End col -->
            </div>
        </div>
    @endsection
