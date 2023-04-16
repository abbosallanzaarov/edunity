@extends('layouts.app')

@section('content')


    <h3 class="text-center">Bu <span class="text-danger">Coin</span> larni boshqaruv sahifasi</h3>
    <form action="{{route('coin.update')}}" method="post" class="row">
        @csrf
        @method('patch')
        <h4 class="col-md-7 m-2">Student agar dars qoldirsa: <b class="text-warning"> {{ $coin->max_coin }}</b></h4> <input type="number" name="max_coin" class="form-control w-25 col-md-5 m-2" value="{{ $coin->max_coin }}">
        <h4 class="col-md-7 m-2">Student dars ga kelsa : <b class="text-warning"> {{ $coin->min_coin }}</b></h4> <input type="number" name="min_coin" class="form-control w-25 col-md-5 m-2" value="{{ $coin->min_coin }}">
        <h4 class="col-md-7 m-2">Student to'g'ri javoblari uchun beriladigan coin: <b class="text-warning"> {{ $coin->true_answer }}</b></h4> <input type="number" name="true_answer" class="form-control w-25 col-md-5 m-2" value="{{ $coin->true_answer }}">
        <h4 class="col-md-7 m-2">Student noto'g'ri javoblari uchun olinadigan coin: <b class="text-warning"> {{ $coin->false_answer }}</b></h4> <input type="number" name="false_answer" class="form-control w-25 col-md-5 m-2" value="{{ $coin->false_answer }}">
        {{-- <span class="col-md-6 w-50"></span> --}}
        <button class="col-md-6 btn btn-primary w-50 ml-5 m-2">Tahrirlash</button>
    </form>


@endsection
