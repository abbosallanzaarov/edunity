@extends('layouts.studentlayout')

@section('content')
<h3 class="m-2 text-center">Kurslar bo'yicha ma'lumotlar</h3>
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th>Kurs Nomi</th>
                <th>Summasi</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
            @forelse ($courses as $course)
                <td> <strong>{{ $course->full_name }}</strong></td>
                <td>{{ $course->salary }}</td>

                <td>
                    <a class=" btn btn-success" href="{{ route('student.course.show',$course->id) }}"><i
                            class="bx bx-edit-alt me-1"></i> Show
                    </a>
                </td>
                </tr>
            @empty
                <h1>kurs mavjud emas</h1>
            @endforelse
</div>

@endsection

