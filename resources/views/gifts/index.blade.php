@extends('layouts.app')
@section('content')
    <div class="row mb-5 mt-5">
        @if ($gift_count > 0)
            <h1 class="text-center">Sovg'alar bo'limi</h1>
        @else
            <h1 class="text-center">Sovg'alar Hozircha Yo'q</h1>
        @endif
        <div class="mb-3 d-flex justify-content-between ">
            <div>
                <a href="{{ route('gift.create') }}" class="btn btn-primary">Yaratish</a>
            </div>
            <div class="input-group" style="width: 280px;">
                <input type="search" id="form1" class="form-control" placeholder="Nomi Boyicha Qidiruv" />
                <button type="button" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
        @forelse ($gifts as  $gift)
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card h-100">
                    <img class="card-img-top" src="{{ asset($gift->image) }}" alt="Card image cap">
                    <div class="card-body">
                        <h3 class="card-title"> Nomi: <span
                                class="text-success badge bg-label-primary me-1">{{ $gift->name }}</span></h3>
                        <h5 class="card-title">Sarlavha: <span
                                class="text-success badge bg-label-info me-1">{{ $gift->title }}</span></h5>
                        <p class="card-text badge bg-label-primary me-1">
                            {{ $gift->desc }}
                        </p>
                        <br>
                        <p class="card-text  badge bg-label-info me-1">
                            Tanga: {{ $gift->coin }}
                            <img
                                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAPxJREFUSEvFlesRAUEQhL+LgBCIQIkAGcgEESACZCAEGSADMiADGVB9tVu11Nq6fRzza6/uZnq6p3euouWoWq6PC/AsDFbX/imAJWCZxMrnzfMV+StACDyLwRSYAWOj4x5YAzfHGMkAK2DpcZiK90sAPIAOsAC2QBc4ACNgCFwMSDIDmzgBToG7kgygrqW/G+paLDSHoL2b2lRz0KAHH0A7YJ4rkU8VueloXtgmkyWyQ1an6lih8wa4A71cBt9sqrrWWTonM1Cy9BeQncHVPGvQRYbcZBFmMQjYvyyDEFA0gyZd+755u1u+i6Z1oD2TEmdn49b5sX+taNDWAV5W80EZOeTFhgAAAABJRU5ErkJggg==" />
                        </p>
                        <div class="d-flex">
                            <div action="" class="mx-2">
                                <a href="{{ route('gift.edit', $gift->id) }}" class="btn btn-primary">
                                    update
                                </a>
                            </div>
                            <form action="{{ route('gift.destroy', $gift->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger">
                                    delete
                                </button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @empty
        @endforelse


    </div>
@endsection
