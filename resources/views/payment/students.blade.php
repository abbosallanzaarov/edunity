@extends('layouts.app')
@section('content')
    @if ($message = Session::get('message_error'))
        <h6 class="text-danger m-4">{{ $message }}</h6>
    @endif
    @if ($message = Session::get('message'))
        <h6 class="text-success m-4">{{ $message }}</h6>
    @endif
    @if ($message = Session::get('monthMessage'))
        <h6 class="text-warning m-4">{{ $message }}</h6>
    @endif
    <div class="row p-2">
        @forelse ($students as $student)
            <div class="col-xxl-4 col-md-6 mb-2">
                <form action="{{ route('student.payment', $student->id) }}" method="post" class="card info-card sales-card">
                    @csrf
                    <div class="filter"> <a class="icon" href="#" data-bs-toggle="dropdown" aria-expanded="false"><i
                                class="bi bi-three-dots"></i></a>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title ">Ism: <span class="text-success"> {{ $student->full_name }}</span> |
                            phone:<span class="text-success"> {{ $student->phone }}</span></h5>
                        <h5 class="card-title ">email: <span class="text-success"> {{ $student->email }}</span> </h5>
                        <div class="d-flex align-items-center">
                            <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i
                                    class="bi bi-cart"></i></div>
                            <div class="ps-3">
                                <h6>
                                    <span class="m-2 text-success">Qaysi oy uchun?</span>
                                    <select name="month" id="" class="form-control mt-2">
                                        @for ($i = 1; $i <= $group_id->length; $i++)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endfor
                                    </select>
                                </h6> 
                                <input type="hidden" name="group_id" value="{{ $group_id->id }}">
                                <span class="text-success small pt-1 fw-bold">Summa</span> <span
                                    class="text-muted small pt-2 ps-1">
                                    <input type="number" name="pay_summa" class="form-control">
                                    <input type="hidden" name="course_id" value="{{ $group_id->course_id }}"
                                        class="form-control">
                                </span>
                                <button class="btn btn-primary mt-2">To'lash</button>
                                <a href="{{ route('student.payment.history', $student->id) }}"
                                    class="btn btn-warning mt-2">Ko'rish</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @empty
            <h4 class="text-danger">O'quvchilar yo'q</h4>
        @endforelse

    @endsection
