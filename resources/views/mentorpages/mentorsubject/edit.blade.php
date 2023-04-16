@extends('layouts.mentorlayout')
@section('mentoryield')
    <form action="{{ route('tema.update', $tema->id) }}" method="post" class="mb-3">
        @csrf
        @method('patch')
        <span>{{ $tema->name }} ni Tahrirlash</span>
        <div class="row">
            <div class="col-lg-12 ml-2">
                <label for="">Mavzu</label>
                <input type="text" name="name" value="{{ $tema->name }}" class="form-control p-3 mb-3">
            </div>
            <div class="col-lg-12 ml-2">
                <label for="">Qaysi Guruh Uchun</label>
                <select name="group_id" class="form-control">
                    <option value=""></option>
                    @forelse ($team as  $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @empty
                        <option value="">Guruhlar Yoq</option>
                    @endforelse
                </select>
                @error('group_id')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="col-lg-11 ml-2">
                <button class="btn btn-primary mt-4">Tahrirlash</button>
            </div>
        </div>
    </form>
@endsection
