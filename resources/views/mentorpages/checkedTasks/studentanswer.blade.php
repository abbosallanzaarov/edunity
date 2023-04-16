@extends('layouts.mentorlayout')
@section('mentoryield')
<h5 class="text-center m-4">Qaysi Mavzu Uchun Javoblarni Kormoqchisiz</h5>
<div class="row ml-2">
    @forelse($tema as $tema)
            <a href="{{route('answer.task.mentor' , $tema->id)}}" class="col-md-4 grid-margin stretch-card">
                <div class="card tale-bg">
                    <div class="card-people mt-auto p-10">
                        <h4 class="location font-weight-normal">Nomi:   {{ $tema->name }}</h4>

                        <h6 class="font-weight-normal">Yaratilgan Vaqt :  {{$tema->created_at}}</h6>
                        <img src="{{    asset('studentpages/images/dashboard/people.svg')}}" alt="people" style=" filter: blur(8px);">

                    </div>
                </div>
            </a>
    @empty
    @endforelse
</div>
</div>

@endsection
