@extends('layouts.studentlayout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Salom {{ Auth::user()->name }}</h3>
                        <h6 class="font-weight-normal mb-0">Bu sizning Mashqlar uchun javoblar sahifasi
                            <span class="text-primary">.</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <table class="table table-dark">
                <thead>
                    <tr>
                        <th scope="col">№</th>
                        <th scope="col">Nomi</th>
                        <th scope="col">Coin</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $id = 0;
                        $name = "";
                        $coin = 0;
                    ?>
                    @forelse($team as $student)
                        <tr>
                            <th>{{ $student->id }}</th>
                            <th>{{ $student->full_name }}</th>
                            <th>{{ $student->balans }}</th>
                        </tr>
                        <?php
                            if($coin < $student->balans){
                                $coin = $student->balans;
                                $name = $student->full_name;
                                $id = $student->id;
                            }
                        ?>
                    @empty
                    @endforelse
                    <tr>
                        <th class="text-warning fw-bold">G'olib</th>
                        <th class="text-warning fw-bold">{{ $name}}</th>
                        <th class="text-warning fw-bold">{{ $coin }}</th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
