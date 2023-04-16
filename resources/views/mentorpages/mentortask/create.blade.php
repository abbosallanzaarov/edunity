@extends('layouts.mentorlayout')
@section('mentoryield')
<a  href="{{route('task.index')}}" class="ml-1 mb-3 btn btn-primary">orqaga</a>
<form action="{{route('task.store')}}" method="post" enctype="multipart/form-data" class="mb-3">
    @csrf
<div class="row">
    <div class="col-lg-12 ml-2">
        <label for="">Mavzu Tanlang</label>
        <select name="tema_id" id="" class="form-control">
            @forelse ($tema as $tema )

            <option value="{{$tema->id}}">{{$tema->name}}</option>
            @empty
            <option value="">Mavzular Yo'q</option>
            @endforelse


        </select>
    </div>
    <div class="col-lg-12 ml-2">
        <label for="">Vazifa</label>
        <input type="text" name="task" class="form-control p-3 mb-3">

    </div>
    <div class="col-lg-12 ml-2">
        <label for="">Qo'shimcha  (Majburi Emas)</label>
        <input type="file" name="file" class="form-control p-3 mb-3">

    </div>
    <div class="col-lg-12 ml-2">
        <button class="btn btn-primary">Yuborish</button>

    </div>

</div>
</form>
@endsection
