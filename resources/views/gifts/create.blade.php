@extends('layouts.app')
@section('content')
    <div class="row mb-5 mt-5">
        <form action="{{ route('gift.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <h1 class="text-center">Sov'ga Yaratish bo'limi</h1>
            <div class="mb-3">
                <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Nomi</label>
                <input name="name" type="text" value="{{ old('name') }}" required class="form-control"
                    id="exampleFormControlReadOnlyInputPlain1">
                @error('name')
                    <p class="help-block text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Sarlavha</label>
                <input name="title" value="{{ old('title') }}" type="text" required class="form-control">
                @error('title')
                    <p class="help-block text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Qisqacha Mazmuni</label>
                <textarea name="desc" class="form-control">{{ old('desc') }}</textarea>
                @error('desc')
                    <p class="help-block text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlReadOnlyInputPlain1" class="form-label">Image</label>
                <input type="file" name="image" class="form-control" value="{{ old('file') }}">
                @error('image')
                    <p class="help-block text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleFormControlReadOnlyInputPlain1" class="form-label text-yellow">
                    <svg xmlns="http://www.w3.org/2000/svg" id="svg" width="24" height="24" viewBox="0 0 24 24"
                        style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                        <path
                            d="M12 22c3.976 0 8-1.374 8-4V6c0-2.626-4.024-4-8-4S4 3.374 4 6v12c0 2.626 4.024 4 8 4zm0-2c-3.722 0-6-1.295-6-2v-1.268C7.541 17.57 9.777 18 12 18s4.459-.43 6-1.268V18c0 .705-2.278 2-6 2zm0-16c3.722 0 6 1.295 6 2s-2.278 2-6 2-6-1.295-6-2 2.278-2 6-2zM6 8.732C7.541 9.57 9.777 10 12 10s4.459-.43 6-1.268V10c0 .705-2.278 2-6 2s-6-1.295-6-2V8.732zm0 4C7.541 13.57 9.777 14 12 14s4.459-.43 6-1.268V14c0 .705-2.278 2-6 2s-6-1.295-6-2v-1.268z">
                        </path>
                    </svg>
                    Tanga
                </label>
                <input type="number" name="coin" class="form-control" value="{{ old('coin') }}">

            </div>
            @error('coin')
                <p class="help-block text-danger">{{ $message }}</p>
            @enderror
            <div class="mb-3">
                <button class="btn btn-primary">Yaratish</button>

            </div </form>
    </div>
    <style>
        #svg {
            background-color: yellow;
        }
    </style>
@endsection
