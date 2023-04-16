@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Yutuqlar</h4>
            <p class="card-description">
               <code>.Sovga topshirilgandan keyin topshirildi ni bosib qoying ozingiz uchun yaxshi</code>
            </p>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>
                                Student
                            </th>
                            <th>
                                Yutugi
                            </th>
                            <th>
                                Qancha
                            </th>
                            <th>
                                Harid Vaqti
                            </th>
                            <th>
                                Delete
                            </th>
                            <th>
                                Topshirildimi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($giftHistory as $gift)
                            <tr>
                                <td class="py-1">
                                    {{ $gift->student_id }}
                                </td>
                                <td>
                                    {{-- {{$gift->gift_id}} --}}
                                    <a href="{{ route('gift.history.show', $gift->gift_id) }}" class="btn btn-primary mb-2"
                                        style="border-radius: 20px;">Ko'rish</a>
                                </td>
                                <td>
                                    {{ $gift->coin }}
                                </td>
                                <td>
                                    {{ $gift->created_at }}
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger mb-2" style="border-radius: 20px;"> Delete</a>
                                </td>
                                <td>
                                    @if ($gift->submitted == 0)
                                        <a href="{{route('gift.submitted', $gift->id)}}" class="btn btn-warning mb-2" style="border-radius: 20px;">
                                            Topshirilmadi</a>
                                    @else
                                    <svg xmlns="http://www.w3.org/2000/svg" width="86" height="36" fill="currentColor" class="bi bi-check text-success" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                      </svg>
                                    @endif
                                </td>
                            </tr>
                        @empty
                        @endforelse

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
