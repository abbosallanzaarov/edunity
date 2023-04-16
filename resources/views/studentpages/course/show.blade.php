@extends('layouts.studentlayout')

@section('content')
<h3 class="m-2 ">Kurs ma'lumotlari</h3>
<hr>
<div class="row">
    <h4 class="col-md-6"><span class="text-primary">Nomi</span>:{{ $course->full_name }}</h3>
    <h4 class="col-md-5"><span class="text-primary">Baxosi</span>:{{ $course->salary }}</h3>
    <p class="col-md-12"><span class="fw-bold text-primary">Malumoti</span>:{{ $course->description }}</p>
</div>

@endsection

