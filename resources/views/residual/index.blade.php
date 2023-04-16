@extends('layouts.app')
@section('content')
<h4 class="text-center mt-2">Guruhlarda Qoldiq Summalarni Ko'rish</h4>
<div class="row w-100" >
@forelse ($teams as $team )
    <div class="card text-center col-md-3 m-3 ">
        <div class="card-header">{{$team->name}}</div>
        <div class="card-body">
          <h5 class="card-title"></h5>
          <p class="card-text"></p>
          <a href="{{ route('residual.students',$team->id) }}" class="btn btn-primary">Ko'rish</a>
        </div>
        <div class="card-footer text-muted text-white"> yaratilgan Vaqt  {{$team->created_at}}</div>
      </div>
      @empty
    </div>

@endforelse


@endsection
