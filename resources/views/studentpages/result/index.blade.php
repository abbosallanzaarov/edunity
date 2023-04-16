@extends('layouts.studentlayout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class=" font-weight-bold">Salom {{ Auth::user()->name }}</h3>
                        <h5 class="font-weight-normal mb-0">Bu sizning <u>Mashqlar</u> uchun umumiy natijasi
                            <span class="text-primary">.</span>
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
            <div class="container px-4 mx-auto">
                <div class="p-6 m-20 bg-white rounded shadow">
                    {!! $chart->container() !!}
                </div>
            </div>
            <script src="{{ $chart->cdn() }}"></script>
            {{ $chart->script() }}
        </div>


        <hr class="my-2">
        <div class="row mb-3">
            <div class="col-xl-6 col-sm-6">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="ti ti-star text-white" style="font-size: 40px;"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white"></h6>
                            <h2 class="mb-4 text-white fs-5" style="font-size: 25px;">{{ $plusCoin }}</h2>
                            <span class="badge bg-info"> Coin </span> <span class="ms-2">Plus Coin</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-sm-6 ">
                <div class="card mini-stat bg-primary">
                    <div class="card-body mini-stat-img">
                        <div class="mini-stat-icon">
                            <i class="ti ti-help text-white" style="font-size: 40px;"></i>
                        </div>
                        <div class="text-white">
                            <h6 class="text-uppercase mb-3 font-size-16 text-white"></h6>
                            <h2 class="mb-4 text-white" style="font-size: 25px;">{{ $minusCoin }}</h2>
                            <span class="badge bg-info"> Coin </span> <span class="ms-2">Minus Coin</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>

        <hr>
        <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">Mavzusi</th>
                        <th scope="col">Ko'rish</th>
                        <th scope="col">Natija</th>
                        <th scope="col">Coin</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($result as $res)
                        <tr>
                            <th class="w-25" scope="row">{{ $res->task_id }}</th>
                            <td class="w-25"><a href="{{ route('studentanswer.results', $res->id) }}">Show</a></td>
                            <td class="w-20">
                                @if ($res->checked === 1)
                                    <i class="ti ti-star"></i>
                                @elseif($res->checked === 0)
                                    <i class="ti ti-help"></i>
                                @elseif($res->checked === null)
                                    <i class="ti ti-check"></i>
                                @endif
                            </td>
                            <td class="w-30">
                                @if ($res->checked === 1)
                                    {{ $res->coin }}
                                @elseif($res->checked === 0)
                                    -{{ $res->coin }}
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse
                </tbody>
            </table>
        </div>
    <hr>
@endsection
