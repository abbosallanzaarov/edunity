@extends('layouts.studentlayout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Salom {{ Auth::user()->name }}</h3>
                        <h6 class="font-weight-normal mb-0">Bu sizning mashqalaringiz sahifasi
                            <span class="text-primary">.</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="card-body">
                <p class="card-title">Advanced Table</p>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example" class="display expandable-table dataTable no-footer" style="width: 100%;" role="grid">

                                <thead>
                                    <th>Tema</th>
                                    <th>vazifa</th>
                                    <th class="" style="width:10% !important">File</th>
                                    <th>FIle turi</th>
                                    <th>Amallar</th>
                                </thead>
                                <tbody>
                                    {{-- @forelse ($tasks as $task) --}}
                                        <tr class="align-center">
                                            <td>{{ $task->tema_id }}</td>
                                            <td>{{ $task->tasks }}</td>
                                            <td class="" style="width:10% !important">
                                                @if ($task->file_type == "audio")
                                                    <audio class="" src="{{ asset($task->file) }}" controls>
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                @elseif($task->file_type == "file")
                                                    <a class="btn btn-warning" href="{{ asset($task->file) }}">Fileni yuklash</a>
                                                @elseif($task->file_type == "image")
                                                    <image class="w-100 h-100" style="border-radius: 0" src="{{ asset($task->file) }}"></image>
                                                @else
                                                    Yuklanmagan
                                                @endif
                                            </td>
                                            <td>{{ $task->file_type }}</td>
                                            <td>
                                                <a class="btn btn-success m-1" href="{{ route('answer.mytasks',$task->id) }}"><i class="bi bi-edit"></i>Javob yo'llash</a>
                                            </td>
                                        </tr>
                                    {{-- @empty --}}

                                    {{-- @endforelse --}}
                                </tbody>

                            </table></div></div><div class="row"><div class="col-sm-12 col-md-5"></div><div class="col-sm-12 col-md-7"></div></div></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-xl-8 mb-4 mb-xl-0">
                <h3 class="m-2 fw-bold">Yuqoridagi topshiriq uchun javob yo'llash</h3>
                <form action="{{ route('answer.mytasks',$task->id) }}" method="post">
                    @csrf
                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                    {{-- <input type="hidden" name="checked" value="undefined"> --}}

                    <textarea name="answer" id="" cols="100" rows="10" class="form-control w-100 m-2">  </textarea>
                    <button class="btn btn-primary p-2 m-2">
                        Saqlash
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
