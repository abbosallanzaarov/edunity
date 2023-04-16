@extends('layouts.app')
@section('content')

    <!-- Start row -->
@forelse ( $group_array as $group  )
<div class="shadow-lg p-3 mb-5 bg-body rounded mt-4">
    <span>Guruh Nomi</span>
    <h2>{{$group['name']}}</h2>
    <span>Active bo'lgan vaqt</span>
    <h6 class="text-success">{{$group['active_date']}}</h6>

</div>
@empty
<h4 class="text-danger text-center mt-2">Hozircha Pul  OlinishI kerak bo'lgan guruhlar yo'q</h4>
@endforelse

    @endsection
