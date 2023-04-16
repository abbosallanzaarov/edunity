@extends('layouts.mentorlayout')
@section('mentoryield')
<h4 class="text-center">Javoblarni Ko'rish uchun ustiiga bosing</h4>
    <div class="list-group">
        @php
        $image = 'image';
        $file = 'file';
        $audio = 'audio';
    @endphp
        @forelse ($tasks as $task)
            <a href="{{route('task.answer.see' , $task->id)}}" class="list-group-item list-group-item-action active m-2 shadow " aria-current="true">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $task->tasks }}</h5>
                </div>
                <p class="mb-1">{{$task->created_at}}</p>

                {{-- <small>
                    @if ($task->file == $image)
                    <img src="{{ asset($task->file_type) }}" alt="image">
                    <small>{{ $task->file_type }}</small>
                @elseif ($task->file_type == $file)
                    <a href="{{ $task->file }}">Ko'rish</a>

                @elseif ($task->file_type == $audio)
                    <audio src="{{ asset($task->audio) }}" controls>
                        <small>{{ $task->file_type }}</small>
                @endif
                </small> --}}

            </a>

        @empty
            <h3 class="text-center">Savollar yo'q</h3>
        @endforelse
    </div>
@endsection
