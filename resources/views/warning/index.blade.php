@extends('layouts.app')

@section('content')


<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                    <h3 class="font-weight-bold">Salom {{ Auth::user()->name }}</h3>
                    <h6 class="font-weight-normal mb-0">Bu ogohlantirishlar sahifasi
                        <span class="text-primary">.</span>
                    </h6>
                    <a href="{{ route('warning.create') }}" class="btn btn-primary m-2">Yaratish</a>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <table class="table table-dark">
            <thead>
                <tr>
                    <th scope="col">Mentor</th>
                    <th scope="col">Student</th>
                    <th scope="col">Ogohlantirish</th>
                    <th>Amallar</th>
                </tr>
            </thead>
            <tbody>
                @forelse($warnings as $warning)
                    <tr>
                        <th>{{ $warning->mentor_id }}</th>
                        <th>{{ $warning->student_id }}</th>
                        <th>{{ $warning->warning }}</th>
                        <th>
                            <a href="{{ route('warning.edit', $warning->id) }}" class="btn btn-primary">Tahrirlash</a>
                            <form action="{{ route('warning.destroy', $warning->id) }}" method="post">
                                @method('DELETE')
                                @csrf

                                <button class="btn btn-label-danger mt-2 m-2">
                                    <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAShJREFUSEu1lWt1AjEQhT8UgAPAQSWAAsABEooCWgc4AAk4ABwgoXVAFcC5nE3PELJkdsPOv33kfvNIbnp0HL2O9bGACbAFRoXQH2AF7KVjARegXygelgsyjgHXN4kHmXvytoI6wDfwmajuD9gA65rEXACJfwEfwNFAJK6ZnavvKYgLoLlMK6EAUcJBXO8OwCBRhQugdTFE75T5K/H/9ntmEEP0nBNvDLA9DwA7k9Sc3S2y4srctugVxAWIxTVQRTz41AF1AXTcF4me28Hrn1nJLpKAtmW8FQVRi+YlB63EPZ5a9E6z+w2uHNv1DhiWpA1IfFm178HsUropA5Q/yeRUcTZyN5oFnCpXlU24wwPQWZCjKuvGkQNoi+ou0A3VKnKAVqJ2UeeAG+d9SRmOiS4YAAAAAElFTkSuQmCC"/>
                                    <span class="align-middle">O'chirish</span>
                                </button>
                            </form>
                        </th>
                    </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
