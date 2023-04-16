@extends('layouts.app')
@section('content')


<div class="d-flex mt-4">
    <div class="shell">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="wsk-cp-product">
                        <div class="wsk-cp-img"><img
                                src="{{asset($gift->image)}}"
                                alt="Product" class="img-responsive" />
                        </div>
                        <div class="wsk-cp-text">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="shell">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="wsk-cp-product">
                        <div class="wsk-cp-img">
                            <span>Nomi</span>
                            <h3>{{$gift->name}}</h3>
                            <span>title</span>
                            <h3>{{$gift->title}}</h3>
                            <span>Coin</span>
                            <h3>{{$gift->coin}}</h3>
                            <span>Qisqacha</span>
                            <h3>{{$gift->desc}}</h3>
                        </div>
                        <div class="wsk-cp-text">
                        </div>
                    </div>

                </div>
                <span>Shu Tavarni  topshirish kerak  {{Auth::user()->name}}  </span>
            </div>
        </div>
    </div>
</div>
            @endsection
