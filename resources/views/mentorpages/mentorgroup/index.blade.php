@extends('layouts.mentorlayout')
@section('mentoryield')
    <div class="row">
        <h3 class="ml-4">Dars qoldirgan O'quvchilarni Belgilang</h3>
        <div class="col-lg-11 ml-2">
            <a href="{{route('student.past.lesson' , $group_id)}}" class="btn btn-primary">Tarix Ko'rish</a>
            <div class="table-responsive table--no-card m-b-30">
                <p>Jami
                    <span class="text-primary"> {{ $student_count }}</span>
                    ta o'quvchi
                </p>
                <table class="table table-borderless table-striped table-earning">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Ism F</th>
                            {{-- <th>Telefon</th> --}}
                            <th class="text-right">Belgilang</th>
                        </tr>
                    </thead>
                    <tbody>
                        <form action="{{ route('mentor.group.attendance') }}" method="post">
                            @csrf
                            @forelse ($student_groupId as $student)
                                <tr>
                                    <td>{{ $student->id }}</td>
                                    <td>{{ $student->full_name }}</td>
                                    {{-- <td>{{$student->phone}}</td> --}}
                                    <td class="text-right form-check form-switch">
                                        <input type="hidden" value="{{ $group_id }}" name="group_id">
                                        <input type="hidden" value="{{ $student_count }}" name="student_count">
                                        <input type="hidden" value="bor" name="{{ $student->id }}">
                                        <input class="form-check-input" value="yo'q" type="checkbox"
                                            name="{{ $student->id }}">
                                    </td>
                                </tr>
                            @empty
                            @endforelse
                    </tbody>
                </table>
                <button class="btn btn-success mt-3 ml-4">Save</button>
                </form>
            </div>
        </div>
    </div>
@endsection
