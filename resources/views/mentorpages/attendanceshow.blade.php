@extends('layouts.mentorlayout')
@section('mentoryield')
    <!-- END BREADCRUMB-->
    <h3 class="text-center">Davomat qilmoqchi bo'lgan guruhni tanlang!</h3>
    <hr>
    <!-- STATISTIC-->
    <div class="row mx-3">
        @forelse ($group as $group)
            <a href="{{ route('mentor.group.index', $group->id) }}" id="hover" class="col-md-4 col-lg-4">
                {{-- <div class="col-md-4"> --}}
                <div class="card p-3 mb-2">
                    <div class="d-flex justify-content-between">
                        <div class="d-flex flex-row align-items-center">
                            <div class="icon ml-3"> <i class="bg-secondary rounded px-3">{{ $group->name }}</i> </div>
                            <div class="ms-2 c-details">
                                <h3 class="ml-5"><i>Guruh</i></h3>
                            </div>
                        </div>
                        <div class="badge"> <span>{{ $group->active }}</span> </div>
                    </div>
                    <div class="mt-5">
                        {{-- <h3 class="heading">Senior Product<br>Designer-Singapore</h3> --}}
                        <div class="">
                            <div class="progress">
                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50"
                                    aria-valuemin="0" aria-valuemax="100">Davomat</div>
                            </div>
                            <div class="mt-3"> <span class="text1">{{ $group->created_at }}<span class="text2"> da yaratilgan</span></span> </div>
                        </div>
                    </div>
                </div>
                {{-- </div> --}}
            </a>
        @empty
            <h3 class="text-center">Sizda Guruhlar Yo'q</h3>
        @endforelse
    </div>

    {{-- style --}}
    <style>
        body {
            background-color: #eee
        }

        .card {
            border: none;
            border-radius: 10px
        }

        .c-details span {
            font-weight: 300;
            font-size: 13px
        }

        .icon {
            width: 50px;
            height: 50px;
            background-color: #eee;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 39px
        }

        .badge span {
            background-color: #fffbec;
            width: 60px;
            height: 25px;
            padding-bottom: 3px;
            border-radius: 5px;
            display: flex;
            color: #fed85d;
            justify-content: center;
            align-items: center
        }

        .progress {
            height: 10px;
            border-radius: 10px
        }

        .progress div {
            background-color: red
        }

        .text1 {
            font-size: 14px;
            font-weight: 600
        }

        .text2 {
            color: #a5aec0
        }
    </style>
@endsection
