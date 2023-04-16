@extends('layouts.mentorlayout')
@section('mentoryield')
@forelse ($answerTask as $answer )
    <div class="shadow-lg p-3 mb-5 bg-body rounded">
        <span>javob vaqti:  {{$answer->created_at}}</span>

        <h1 class="text-center" >{{$answer->student_id}}</h1>
        <span>{{$answer->answer}}</span>
        <div>
        <form action="{{route('task.answer.check' , $answer->id)}}" method="post" class="mt-4">
            @csrf
            <span>Belgilang</span>
            <input type="submit" name="yes" class="btn btn-success" value="To'g'ri">
            <input type="submit" name="no" class="btn btn-danger" value="Notog'ri">
        </form>

        </div>
    </div>
@empty

@endforelse

@endsection


