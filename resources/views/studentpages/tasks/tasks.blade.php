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
                <div class="col-md-6 grid-margin transparent">
                    <div class="row">
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-tale">
                                <div class="card-body">
                                    <p class="mb-4">To'gri Javob Uchun </p>
                                    <p class="fs-30 mb-2"><i class="ti ti-star"></i></p>
                                    <p>Sizga Coin beriladi</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-4 stretch-card transparent">
                            <div class="card card-dark-blue">
                                <div class="card-body">
                                    <p class="mb-4">Javob berilmagan</p>
                                    <p class="fs-30 mb-2"><i class="ti ti-close"></i></p>
                                    <p>shu belgi ko'rinadi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                            <div class="card card-light-blue">
                                <div class="card-body">
                                    <p class="mb-4">Hali tekshirilmagan</p>
                                    <p class="fs-30 mb-2"><i class="ti ti-check"></i></p>
                                    <p>Bo'lsa</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 stretch-card transparent">
                            <div class="card card-light-danger">
                                <div class="card-body">
                                    <p class="mb-4">Noto'g'ri javob uchun </p>
                                    <p class="fs-30 mb-2"><i class="ti ti-help"></i></p>
                                    <p>va Coin olinadi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"></div>
                                <div class="col-sm-12 col-md-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="example" class="display expandable-table dataTable no-footer"
                                        style="width: 100%;" role="grid">

                                        <thead>
                                            <th>Tema</th>
                                            <th>vazifa</th>
                                            <th class="" style="width:10% !important">File</th>
                                            <th>FIle turi</th>
                                            <th>Amallar</th>
                                            <th>Javob mavjud</th>

                                        </thead>
                                        <tbody>
                                            @forelse ($tasks as $task)
                                                <tr class="align-center">
                                                    <td>{{ $task->tema_id }}</td>
                                                    <td>{{ $task->tasks }}</td>
                                                    <td class="" style="width:10% !important">
                                                        @if ($task->file_type == 'audio')
                                                            <audio class="" src="{{ asset($task->file) }}" controls>
                                                                Your browser does not support the audio element.
                                                            </audio>
                                                        @elseif($task->file_type == 'file')
                                                            <a class="btn btn-warning"
                                                                href="{{ asset($task->file) }}">Fileni yuklash</a>
                                                        @elseif($task->file_type == 'image')
                                                            <image class="w-100 h-100" style="border-radius: 0"
                                                                src="{{ asset($task->file) }}"></image>
                                                        @else
                                                            Yuklanmagan
                                                        @endif
                                                    </td>
                                                    <td>{{ $task->file_type }}</td>
                                                    <td>

                                                        @if (App\Models\AnswerTasks::where('task_id', $task->id)->where('student_id', $student->id)->first())
                                                            {{-- <i class="ti ti-star"></i> --}}
                                                            <span class="btn btn-primary">Siz avval javob bergansiz</span>
                                                            {{-- @endif --}}
                                                        @else
                                                            {{-- <i class="ti ti-close "></i> --}}
                                                            <a class="btn btn-success m-1"
                                                                href="{{ route('answer.mytasks', $task->id) }}"><i
                                                                    class="bi bi-edit"></i>Javob yo'llash</a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if (App\Models\AnswerTasks::where('task_id', $task->id)->where('student_id', $student->id)->first())
                                                            {{-- {{App\Models\AnswerTasks::where('task_id',$task->id)->first()->id}} --}}
                                                            @if (App\Models\AnswerTasks::where('task_id', $task->id)->where('student_id', $student->id)->first()->checked === 1)
                                                                <i class="ti ti-star"></i>
                                                            @elseif(App\Models\AnswerTasks::where('task_id', $task->id)->where('student_id', $student->id)->first()->checked === 0)
                                                                <i class="ti ti-help"></i>
                                                            @elseif(App\Models\AnswerTasks::where('task_id', $task->id)->where('student_id', $student->id)->first()->checked === null)
                                                                <i class="ti ti-check"></i>
                                                            @endif
                                                        @else
                                                            <i class="ti ti-close "></i>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-5"></div>
                                <div class="col-sm-12 col-md-7"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
