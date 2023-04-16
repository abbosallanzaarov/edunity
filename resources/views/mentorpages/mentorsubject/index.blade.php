@extends('layouts.mentorlayout')
@section('mentoryield')
    <form action="{{ route('tema.store') }}" method="post" class="mb-3">
        @csrf
        <div class="row">
            <span class="text-success ml-4">
                @if ($message = Session::get('tema'))
                    {{ $message }}
                @endif
                @if ($message = Session::get('delete_team'))
                    {{ $message }}
                @endif
                @if ($message = Session::get('success_update'))
                    {{ $message }}
                @endif
            </span>


            <div class="col-lg-12 ml-2">
                <label for="">Mavzu</label>
                <input type="text" name="name" class="form-control p-3 mb-3">
                @error('name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
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
                <button class="btn btn-primary mt-4">Yuklash</button>
            </div>
        </div>
    </form>
    <div class="top-campaign">
        <h3 class="title-3 m-b-30">
            @if ($tema_count > 0)
                {{ Auth::user()->name }} Bu Sizning Mavzularingiz
            @else
                Sizda Hozircha Mavzular Yo'q
            @endif
        </h3>
        <div class="table-responsive">
            <table class="table table-top-campaign">
                <tbody>
                    @forelse ($tema as $tema)
                        <tr>
                            <td>{{ $tema->name }}</td>
                            <td>{{ $tema->group_id }}</td>
                            <td class="d-flex">
                                <a href="{{ route('tema.edit', $tema->id) }}" class="item mr-4 fs-5"
                                    data-original-title="Edit">
                                    <i class="zmdi zmdi-edit"></i>
                                </a>
                                <form action="{{ route('tema.destroy', $tema->id) }}" method="POST">
                                    @method('delete')
                                    @csrf
                                    <button class="zmdi zmdi-delete"></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
@endsection
