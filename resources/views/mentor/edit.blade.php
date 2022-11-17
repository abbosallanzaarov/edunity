@extends('layouts.app')
@section('content')
</br>
<form action="{{route('mentor.update', $mentor->id)}}" method="post" enctype="multipart/form-data">
@method('put')
@csrf
 <div class="col-12">
    <div class="card mb-4">
      <h5 class="card-header">{{$mentor->full_name}} Tahrirlash</h5>
      <div class="card-body">
        <div class="row">
          <!-- Credit Card -->
          <div class="col-xl-4 col-md-6 col-sm-12 mb-4" method="post" action="#">

            <label class="form-label" for="creditCardMask">ISM F..</label>
            <div class="input-group input-group-merge">
              <input type="text" name="full_name" id="creditCardMask" value="{{$mentor->full_name}}" name="full_name" class="form-control credit-card-mask" placeholder="Name" aria-describedby="creditCardMask2" />
              <span class="input-group-text cursor-pointer p-1" id="creditCardMask2"><span class="card-type"></span></span>
            </div>
          </div>
          <!-- Phone Number -->
          <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
            <label class="form-label" for="phone-number-mask">Telefon N..</label>
            <div class="input-group">
              <span class="input-group-text">UZB (+998)</span>
              <input type="number" name="phone" id="phone-number-mask" value="{{$mentor->phone}}" class="form-control phone-number-mask" placeholder="202 555 0111" />
            </div>
          </div>
          <!-- Date -->
          <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
            <label class="form-label" for="date-mask">Maoshi</label>
            <input type="number" value="{{$mentor->salary}}" id="date-mask" class="form-control date-mask" placeholder="Salary" />
          </div>
          <!-- Time -->
          <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
            <label class="form-label" for="time-mask">Rasm</label>
            <input type="file" name="image" value="{{$mentor->image}}" id="time-mask" class="form-control time-mask" placeholder="" />
          </div>
          <!-- Numeral Formatting -->
          <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
            <label class="form-label" for="numeral-mask">Email </label>
            <input type="email" value="{{$mentor->email}}" name="email" id="numeral-mask" class="form-control numeral-mask" placeholder="Email" />
          </div>
          <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
            <label class="form-label" for="numeral-mask">Email </label>
            <input type="password" value="{{$mentor->password}}" name="password" id="numeral-mask" class="form-control numeral-mask" placeholder="password" />
          </div>
       <!-- button update -->
 <div class="col-xl-4 col-md-6 col-sm-12 mb-4">
            <label class="form-label" for="numeral-mask">Tahrirlash </label>
            <button type="submit"   value="Tahrirlash" class="form-control numeral-mask bg-primary text-white" >
             Tahrirlash
             </button>
          </div>

            <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
              <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                  class="avatar avatar-xs pull-up" aria-label=" bu {{$mentor->full_name}}"
                      data-bs-original-title="bu {{$mentor->full_name}}">
                    <img src="{{ $mentor->image }}" alt="{{ $mentor->full_name }}"
                 class="rounded-circle"></li>
           </ul>

        </div>
      </div>
    </div>
  </div>
      </from>

@endsection
