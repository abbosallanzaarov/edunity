@extends('layouts.mentorlayout')
@section('mentoryield')
    <div class="heading">
        <h1 class="heading__title"></h1>
        <p class="heading__credits"><a class="heading__link" target="_blank">
                <h3>{{ $group->name }}</h3>
                Guruh mavzulari
            </a></p>
    </div>

    <div class="main-container row">
        @forelse ($temas as $tema)
            <div class="hero-unit shadow col-md-4 p-3">
                <h1>{{ $tema->name }}</h1>
                <p>{{ $tema->created_at }}</p>
                <p>
                    <a class="btn btn-primary btn-large" href="{{ route('tema_tasks', $tema->id) }}">
                        Vazifalar
                    </a>
                </p>
            </div>
        @empty
        @endforelse
    </div>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica,
                Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
        }

        .main-container {
            padding: 30px;
        }

        /* HEADING */

        .heading {
            text-align: center;
        }

        .heading__title {
            font-weight: 600;
        }

        .heading__credits {
            margin: 10px 0px;
            color: #888888;
            font-size: 25px;
            transition: all 0.5s;
        }

        .heading__link {
            text-decoration: none;
        }

        .heading__credits .heading__link {
            color: inherit;
        }

        /* CARDS */

        .cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .card {
            margin: 20px;
            padding: 20px;
            width: 500px;
            min-height: 200px;
            display: grid;
            grid-template-rows: 20px 50px 1fr 50px;
            border-radius: 10px;
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.25);
            transition: all 0.2s;
        }

        .card:hover {
            box-shadow: 0px 6px 10px rgba(0, 0, 0, 0.4);
            transform: scale(1.01);
        }

        .card__link,
        .card__exit,
        .card__icon {
            position: relative;
            text-decoration: none;
            color: rgba(255, 255, 255, 0.9);
        }

        .card__link::after {
            position: absolute;
            top: 25px;
            left: 0;
            content: "";
            width: 0%;
            height: 3px;
            background-color: rgba(255, 255, 255, 0.6);
            transition: all 0.5s;
        }

        .card__link:hover::after {
            width: 100%;
        }

        .card__exit {
            grid-row: 1/2;
            justify-self: end;
        }

        .card__icon {
            grid-row: 2/3;
            font-size: 30px;
        }

        .card__title {
            grid-row: 3/4;
            font-weight: 400;
            color: #ffffff;
        }

        .card__apply {
            grid-row: 4/5;
            align-self: center;
        }

        /* CARD BACKGROUNDS */

        .card-1 {
            background: radial-gradient(#1fe4f5, #3fbafe);
        }

        .card-2 {
            background: radial-gradient(#fbc1cc, #fa99b2);
        }

        .card-3 {
            background: radial-gradient(#76b2fe, #b69efe);
        }

        .card-4 {
            background: radial-gradient(#60efbc, #58d5c9);
        }

        .card-5 {
            background: radial-gradient(#f588d8, #c0a3e5);
        }

        /* RESPONSIVE */

        @media (max-width: 1600px) {
            .cards {
                justify-content: center;
            }
        }
    </style>
@endsection
