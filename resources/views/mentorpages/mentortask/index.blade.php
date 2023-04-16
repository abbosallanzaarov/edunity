@extends('layouts.mentorlayout')
@section('mentoryield')
<div class="table-responsive">
    <h5 class="text-center m-2">Mavzu Haqida Malumotlarni To'ldiring Studentlar Uchun </h5>
    <a href="{{route('task.create')}}" class="ml-3 mb-2 btn btn-primary">Yaratish</a>
    <table class="table table-top-campaign border">
        <thead>
            <th>Nomi</th>
            <th>vazifa</th>
            <th>Image</th>
            <th>pdf</th>
            <th>File</th>
            <th>Amallar</th>
        </thead>
        <tbody>
            @forelse ($tasks as $task)
            <tr>
                <td>{{$task->tema_id}}</td>
                <td>{{$task->image}}</td>
                <td>{{$task->pdf}}</td>

                <td>
                    @if ($task->audio)
                    <audio src="{{$task->audio}}" controls>
                        Your browser does not support the audio element.
                        </audio>
                        {{-- <a href="{{ $task->audio }}">Vazifani Ko'rish</a> --}}
                        @else
                        Yuklanmagan
                    @endif
                </td>
                <td class="d-flex">
                    <button>deete</button>
                    <button>deete</button>

                </td>
            </tr>
            @empty
            <tr>
            </tr>
            @endforelse

        </tbody>
    </table>
</div>
@endsection
