@extends('layouts.studentlayout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Salom {{ Auth::user()->name }}</h3>
                        <h6 class="font-weight-normal mb-0">Bu sizning guruhlaringiz sahifasi
                            <span class="text-primary">.</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse($team as $group)
                    <a href="{{route('team.students' , $group->id)}}" class="col-md-4 grid-margin stretch-card">
                        <div class="card tale-bg">
                            <div class="card-people mt-auto p-10">
                                <img src="{{    asset('studentpages/images/dashboard/people.svg')}}" alt="people" style=" filter: blur(8px);">
                                <div class="weather-info p-10">
                                    <div class="d-flex p-10 justify-content-between align-between">
                                        <div>
                                            <h2 class="mb-0 font-weight-normal">
                                                @if ($group->active == 1)
                                                    <h1 class="btn btn-primary  badge bg-label-success me-1">Activ</span>
                                                @else
                                                    <h1 class="btn btn-danger  badge bg-label-danger me-1"> No Activ</span>
                                                @endif
                                            </h2>
                                        </div>
                                        <hr>
                                        <div class="ml-2">
                                            <h4 class="location font-weight-normal">{{ $group->name }} - Guruh</h4>
                                            <hr>
                                            <h6 class="font-weight-normal">O'qituvchi :  {{$group->mentor->full_name}}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
            @empty
            @endforelse
        </div>
    </div>
@endsection
