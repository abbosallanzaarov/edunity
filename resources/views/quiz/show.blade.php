@extends('layouts.app')
@section('content')
    <div class="container mt-5">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img class="d-block w-100" src="..." alt="First slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Second slide">
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Third slide">      
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
@endsection
{{-- @forelse ($quizzes as $quiz )
<div class="carousel-inner">
    <div class="carousel-item active">
        <h3 class="text-center">{{$quiz->question}}</h3>
       <div class="d-fle">
        <span class="btn btn-primary p4 bordered shadow">{{$quiz->answer1}}</span>
        <span class="btn btn-primary p4 bordered shadow" >{{$quiz->answer2}}</span>
        <span class="btn btn-primary p4 bordered shadow">{{$quiz->answer3}}</span>
        <span class="btn btn-primary p4 bordered shadow">{{$quiz->answer4}}</span>
       </div>

      </div>
</div>
@empty
@endforelse --}}
