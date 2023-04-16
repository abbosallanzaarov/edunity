@extends('layouts.studentlayout')

@section('content')
{{-- <div class="d-flex">

    <div class="d-flex align justify-content-center">
        <div class="shadow p-3 m-5 bg-light rounded w-10" style="width: 100px;" >
            <h4 class="d-flex justify-content-center text-danger font-weight-bold"> -{{$noCount}}</h4>
            <span class="d-flex justify-content-center">
                Jami
            </span>
        </div>
    </div>
    <div class="d-flex align justify-content-center">
        <div class="shadow p-3 m-5 bg-light rounded w-10" style="width: 100px;" >
            <h4 class="d-flex justify-content-center text-success font-weight-bold">+{{$yesCount}}</h4>
            <span class="d-flex justify-content-center">
                Jami
            </span>
        </div>
    </div>
</div> --}}
<div class="row m-2 mt-2">
    <div class="col-md-6 mb-4 stretch-card transparent ">
      <div class="card card-tale" style="background: #FF5733; color:white;">
        <div class="card-body">
          <p class="mb-4">Jami Qoldirgansiz</p>
          <p class="fs-30 mb-2"> - {{$noCount}}</p>
          <p>10.00% (30 days)</p>
        </div>
      </div>
    </div>
    <div class="col-md-6 mb-4 stretch-card transparent ">
      <div class="card card-dark-blue">
        <div class="card-body">
          <p class="mb-4">Jami Kelgansiz</p>
          <p class="fs-30 mb-2">+ {{$yesCount}}</p>
          <p>22.00% (30 days)</p>
        </div>
      </div>
    </div>
  </div>
    <div class="container mt-5">
        @forelse($attendance as $at)
        <div class="shadow p-3 mb-5 bg-light rounded">
            @if ($at->no == 'bor')
            {{$at->date}}<span class="text-success pl-3 font-italic">bu sanada borsiz</span>   <br>   <h4 class="text-success pt-2">+ 1</h4>
            @elseif ($at->no = "yo'q")
            {{$at->date}}  <span class="text-danger font-italic"> bu sanada yo'qsiz</span>   <br>  <h4 class="text-danger">- 1</h4>
            @endif
        </div>
        @empty

        @endforelse
    </div>
@endsection
