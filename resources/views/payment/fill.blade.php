@extends('layouts.app')
@section('content')
    <h1>Balansni to'ldirish</h1>
    <div class="col-sm-12">
        @if ($message = Session::get('successpayment'))
            <div
                class="alert fade alert-simple alert-success alert-dismissible text-left font__family-montserrat font__size-16 font__weight-light brk-library-rendered rendered show">
                <i class="start-icon far fa-check-circle faa-tada animated"></i>
                <strong class="font__weight-semibold">{{$student->full_name}} ga</strong>
                <br>
                {{ $message }}
            </div>
        @endif
    </div>
    <h4>Student: <span class="text-primary">{{ $student->full_name }}</span></h4>
    <form action="{{ route('payment.filling', $student->id) }}" method="post">
        @csrf
        <input type="number" name="price" class="form-control mb-2">

        <button class="btn btn-primary">To'ldirish</button>

    </form>
@endsection
