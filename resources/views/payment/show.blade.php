@extends('layouts.app')
@section('content')
    <div class="row p-2">
        <table class="table">
            <thead>
                <tr>
                    <th>Guruhi </th>
                    <th scope="col">oy</th>
                    <th scope="col">to'lov su..</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($groups as $group)
                    @forelse ($payHistory as $pay)
                        @if($group->id === $pay->group_id)
                            <tr>
                                <th>{{ $group->id }}</th>
                                <th scope="row">{{ $pay->month }} oy</th>
                                <td>{{ $pay->summa }}</td>
                                <td>
                                    <button class="btn btn-primary">TAHRIRLASH</button>
                                    <button class="btn btn-danger">delete</button>
                                </td>
                            </tr>
                        @endif
                    @empty
                        <h4 class="text-danger">To'lav yo'q</h4>
                    @endforelse
                    
                @empty

                @endforelse
            </tbody>
        </table>
    @endsection
