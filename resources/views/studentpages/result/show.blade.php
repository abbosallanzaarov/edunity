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
        <div class="row">
            <h4 class="col-md-12 ">Javob status:
                <span class="text-danger">
                    @if($result->checked === 1)
                        <i class="ti ti-star"></i>
                    @elseif($result->checked === 0 )
                        <i class="ti ti-help"></i>
                        @elseif($result->checked === null)
                        <i class="ti ti-check"></i>
                    @endif
                </span>
            </h4>
            <h4 class="col-md-12 ">Javob uchun belgilangan coin:
                <span class="text-danger">
                    @if($result->checked === 1)
                            {{ $result->coin }}
                    @elseif($result->checked === 0 )
                            -{{ $result->coin }}
                    @endif</span>
            </h4>
            <hr>
            <p class="col-md-12 "><span class="fw-bold">Javobingiz:</span> <span class="text-danger">{{ $result->answer }}</span></p>
        </div>
    </div>
@endsection
