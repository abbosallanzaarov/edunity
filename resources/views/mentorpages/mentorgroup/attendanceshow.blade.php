@extends('layouts.mentorlayout')
@section('mentoryield')
    <h3>Davomat qilinishi kerak guruhni tanlang!</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">nomi</th>
                @forelse ($attendance as $at )
                <th scope="col">{{$at->date}}</th>
                @break
                @empty
                @endforelse
            </tr>
            {{-- <tr>
                @forelse ($attendance as $at )
                <th scope="col">{{$at->no}}</th>
                @empty
                @endforelse

            </tr> --}}
        </thead>
         <tbody>
            @forelse ($data as $at)
                <tr>
                    <td scope="row">{{ $at['full_name'] }}</td>
                </tr>
            @empty
            @endforelse

        </tbody>
    </table>
@endsection
