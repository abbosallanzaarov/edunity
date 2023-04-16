@extends('layouts.app')

@section('content')


<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Salom {{ Auth::user()->name }}</h3>
                    <h6 class="font-weight-normal mb-0">Bu ogohlantirishlar yaratish
                        <span class="text-primary">.</span>
                    </h6>
                    {{-- <a href="{{ route('warning.create') }}" class="btn btn-primary m-2">Yaratish</a> --}}
                </div>
            </div>
        </div>
    </div>
    <hr>
    <form action="{{ route('warning.store') }}" method="post" class="row">
        @csrf
        <div class="col-md-12">
            <h4 class="text-center">Siz ogohlantirish yubormoqchi bolgan studentni yoki mentorni tanlang agarda malumot ikkalasiga ham ko'rinishini ishasangiz ikkalasini ham tanlashingiz mumkin</h4>
            <hr>
        </div>
        <div class="col-md-6">
            <h4>Studentni tanlang:</h4>
        </div>
        <div class="col-md-6">
            <select name="student_id" id="" class="form-control m-1">
                <option value="">Student tanlang</option>
                @forelse($students as $student)
                    <option value="{{ $student->id }}">{{ $student->full_name  }} - {{  $student->email }}</option>
                @empty
                    <option value="">Student mavjud emas</option>
                @endforelse
            </select>
        </div>

        <div class="col-md-6">
            <h4>Mentorni tanlang:</h4>
        </div>
        <div class="col-md-6">
            <select name="mentor_id" id="" class="form-control m-1">
                <option value="">Mentorni tanlang</option>
                @forelse($mentors as $mentor)
                    <option value="{{ $mentor->id }}">{{ $mentor->full_name  }} - {{  $mentor->email }}</option>
                @empty
                    <option value="">Mentor mavjud emas</option>
                @endforelse
            </select>
        </div>
        <div class="col-md-12">
            <textarea name="warning" id="" cols="100" rows="10" class="w-100 form-control m-1"></textarea>
        </div>
        <button class="btn btn-primary">Yaratish</button>
    </form>
</div>

@endsection
