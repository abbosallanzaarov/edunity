@extends('layouts.mentorlayout')
@section('mentoryield')
<div>

    <div class="card">
        <div class="card-body">
          <h4 class="card-title">Studentlar Ro'yxati</h4>
          <p class="card-description">
            Add class <code>.table</code>
          </p>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Ism F..</th>
                  <th>Phone.</th>
                  <th>kelgan Vaqt</th>
                  <th>Coin</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($students as $student)
                <tr>
                    <td>{{$student->full_name}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{{$student->created_at}}</td>
                    <td><label class="badge badge-danger">{{$student->balans}}</label></td>
                  </tr>

                @empty

                @endforelse

              </tbody>
            </table>
          </div>
        </div>
      </div>
</div>
@endsection
