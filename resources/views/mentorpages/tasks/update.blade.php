@extends('layouts.mentorlayout')
@section('mentoryield')
    <form action="{{ route('task.update',$tasks->id) }}" method="post" enctype="multipart/form-data" class="mb-3">
        {{-- <span class="text-center">
            <h3>{{ $tema_id->name }}</h3> 
            <h4> Mavzusi uchun Vazifa Kiriting</h4>
        </span> --}}
        @csrf
        <div class="row">
            {{-- <input type="hidden" value="{{ $tema_id->id }}" name="tema_id"> --}}
            <div class="col-lg-12 ml-2">
                <label for="">Vazifa</label>
                <textarea name="task" id="" cols="5" rows="10" class="form-control">{{ $tasks->task }}</textarea>
            </div>
            {{-- <div class="col-lg-12 ml-2">
                <label for="">Audio (Majburi Emas)</label>
                <input type="file" name="audio_name" class="form-control p-3 mb-3" accept="mp3/*">
            </div>
            <div class="col-lg-12 ml-2">
                <label for="">Image (Majburi Emas)</label>
                <input type="file" name="image_name" class="form-control p-3 mb-3" accept="image/*">
            </div> --}}
            <div class="col-lg-12 ml-2">
                <label for="">File turini tanlang</label>
                <select name="file_type" id="" class="form-control" value="{{ $tasks->file_type }}">
                    <option value="image">Rasm</option>
                    <option value="file">File</option>
                    <option value="audio">Audio</option>
                </select>
            </div>
            <div class="col-lg-12 ml-2">
                <label for="">File yuklash</label>
                <input type="file" name="file" class="form-control p-3 mb-3" accept="file/*" value="{{ $tasks->file }}">
            </div>
            <div class="col-lg-12 ml-2">
                <button class="btn btn-primary">Yuborish</button>
            </div>
        </div>
    </form>
    {{-- <div class="table-responsive">
        <table class="table table-top-campaign border">
            <thead>
                <th>Tema</th>
                <th>vazifa</th>
                <th>File</th>
                <th>FIle turi</th>
                <th>Amallar</th>
            </thead>
            <tbody>
                @forelse ($tasks as $task)
                    <tr class="align-center">
                        <td>{{ $task->tema_id }}</td>
                        <td>{{ $task->tasks }}</td>
                        <td class="w-25">
                            @if ($task->file_type == "audio")
                                <audio class="" src="{{ asset($task->file) }}" controls>
                                    Your browser does not support the audio element.
                                </audio>
                            @elseif($task->file_type == "file")
                                <a href="{{ asset($task->file) }}">Fileni yuklash</a>
                            @elseif($task->file_type == "image")
                                <image class="" src="{{ asset($task->file) }}"></image>
                            @else
                                Yuklanmagan
                            @endif
                        </td>
                        <td>{{ $task->file_type }}</td>
                        <td class="d-flex">
                            <button>deete</button>
                        </td>
                    </tr>
                @empty
                    <tr>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div> --}}
@endsection
