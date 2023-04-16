@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="row dflex flex-reverse">
        @forelse ($quizSection as $section )
        <a href="{{route('quiz.show', $section->id)}}" class="shadow p-3 mb-5 bg-white rounded">
            <div class="d-flex justify-content-between">
                <h3>{{$section->quiz_name}}</h3>

                <i class='bx bx-skip-next-circle fs-4 pr-2'>|Savol</i>
            </div>
        <span>{{$section->desc}}</span>
        </a>

        @empty
        <span>Savollar toplami yoq</span>
        @endforelse
    </div>
</div>

@endsection
