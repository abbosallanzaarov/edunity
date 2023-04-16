@extends('layouts.app')
@section('content')
    <h4 class="text-center mt-2">Student to'lavlari</h4>
    <h4 class="text-center mt-2">Kurs uchun to'lav narxi : {{ $salary }} so'm.</h4>

    {{-- <div class="row w-100" > --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                {{-- <th scope="col">Last</th> --}}
                @for ($i = 1; $i <= $length; $i++)
                    <td>{{ $i }} oy To'lov <span class="text-danger">/qoldiq</span></td>
                @endfor
            </tr>
        </thead>
        <tbody>
            @forelse ($payments as $key =>$value)
                <tr>
                    <th scope="row"></th>
                    <td>{{ $key }}</td>
                    @for ($i = 1; $i <= $length; $i++)
                        @php
                        $summa = 0;
                        $pay_sum = 0;
                        $reisual = 0;
                        @endphp
                        <td>
                            @foreach ($value[$i] as $sum)
                            @php $summa = $summa + $sum['summa'];
                                $pay_sum = $summa;
                                $reisual = $salary - $pay_sum;
                            @endphp
                            @endforeach
                            {{ $pay_sum }}<span class="text-danger">   /{{ $reisual }}</span>
                        </td>
                    @endfor
                </tr>
            @empty
            @endforelse
        </tbody>
    </table>
    {{-- </div> --}}


@endsection
