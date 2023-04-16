@extends('layouts.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
    <div class="card" style="width: 100%">
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Mentor malumotlarini kiriting!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('mentor.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer01"> ISM F..</label>
                                    {{-- <input type="text" class="form-control " name="full_name" id="validationServer01" placeholder="name" value="{{old('full_name')}}" > --}}
                                    <input type="text" name="full_name" class="form-control" style="width: 200px;" id="validationServer03"
                                        value="{{ old('full_name') }}" placeholder="Name">
                                    @error('name')
                                        <p class="help-block text danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer02">Telefon N..</label>
                                    <input type="number" name="phone" class="form-control" style="width: 200px;" id="validationServer02"
                                        placeholder="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                        <p class="help-block text danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-4 mb-3">
                                    <label for="validationServer02">email </label>
                                    <input type="email" name="email" class="form-control" style="width: 200px;" id="validationServer02"
                                        placeholder="email" value="{{ old('email') }}">
                                    @error('phone')
                                        <p class="help-block text danger">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationServer03">Maoshi</label>
                                    <input type="number" name="salary" class="form-control" style="width: 200px;" id="validationServer03"
                                        value="{{ old('salary') }}" placeholder="Salary">
                                    @error('salary')
                                        <p class="help-block text danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer04">Rasm</label>
                                    <input type="file" name="image" class="form-control" style="width: 200px;"
                                        id="validationServer04" placeholder="State">
                                    @error('image')
                                        <p class="help-block text danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationServer04">Password</label>
                                    <input type="password" name="password" style="width: 200px;" class="form-control "
                                        id="validationServer04" placeholder="Password">
                                    @error('password')
                                        <p class="help-block text danger">{{ $message }}</p>
                                    @enderror
                                </div> {{-- <div class="col-md-3 mb-3">
                    <label for="validationServer05">Zip</label>
                    <input type="text" class="form-control is-invalid" id="validationServer05" placeholder="Zip" required>
                    <div class="invalid-feedback">
                      Please provide a valid zip.
                    </div>
                  </div> --}}
                            </div>

                            <button class="btn btn-primary" type="submit">create</button>
                        </form>
                    </div>


                </div>
            </div>
        </div>
        {{-- modal end --}}

        @if($errors->any())
        <div class="alert alert danger">
        <ul>
        @foreach($errors->all() as $error)
        <li class="text-danger">{{$error}}</li>
        @endforeach
        </ul>
        </div>
        @endif
        <div class="d-flex justify-content-start my-2" >
            <div class="mx-2">
                <input type="search" placeholder="SEARCH" class="form-control">
            </div>
            <div class="mx-4">
                <button type="button" style="width: 10rem" class="btn btn-primary fs-5 " data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                Add Mentor
            </button>
            </div>

            <style>
                #pdf{
                    font-size: 20px
                }
            </style>
            <div class="text-center">

                {{-- {{$mentors->links()}} --}}
            </div>

        </div>
        <div class="card-datatable table-responsive">
            <div id="DataTables_Table_2_wrapper" class="dataTables_wrapper dt-bootstrap5">

                <table class="dt-row-grouping table border-top dataTable dtr-column" id="DataTables_Table_2"
                    aria-describedby="DataTables_Table_2_info" style="width: 1035px;">
                    <thead>
                        <tr>
                            <th class="control sorting_disabled dtr-hidden" rowspan="1" colspan="1"
                                style="width: 26px; display: none;" aria-label="">
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1" style="width: 86px;" aria-label="Name: activate to sort column ascending">
                                #
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1" style="width: 86px;" aria-label="Name: activate to sort column ascending">
                                ISM F..
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1" style="width: 90px;"
                                aria-label="Email: activate to sort column ascending">
                                Telefon N..
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1" style="width: 73px;" aria-label="City: activate to sort column ascending">
                                Maoshi
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1" style="width: 77px;" aria-label="Date: activate to sort column ascending">
                                email
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1" style="width: 107px;"
                                aria-label="Salary: activate to sort column ascending">
                                Rasm
                            </th>

                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_2" rowspan="1"
                                colspan="1" style="width: 104px;"
                                aria-label="Status: activate to sort column ascending">
                                password
                            </th>

                            <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 112px;"
                                aria-label="Actions">Amallar
                            </th>

                        </tr>
                    </thead>
                    <tbody class="alldata">

                        @forelse ($mentors as $mentor)
                            <tr>
                                <td>{{ $mentor->id }}</td>
                                <td>{{ $mentor->full_name }}</td>
                                <td>{{ $mentor->phone }}</td>
                                <td>{{ $mentor->salary }}</td>
                                <td>{{ $mentor->email }}</td>
                                <td>
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-xs pull-up" aria-label=" bu {{$mentor->full_name}}"
                                            data-bs-original-title="bu {{$mentor->full_name}}">
                                            <img src="{{ asset("$mentor->image") }}" alt="{{ $mentor->full_name }}"
                                                class="rounded-circle">
                                        </li>
                                    </ul>
                                </td>
                                <td>{{ $mentor->password }}</td>
                                <td class="d-flex">
                                    <form action="{{ route('mentor.destroy', $mentor->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf

                                        <button class="btn btn-label-danger mt-2 m-2">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAShJREFUSEu1lWt1AjEQhT8UgAPAQSWAAsABEooCWgc4AAk4ABwgoXVAFcC5nE3PELJkdsPOv33kfvNIbnp0HL2O9bGACbAFRoXQH2AF7KVjARegXygelgsyjgHXN4kHmXvytoI6wDfwmajuD9gA65rEXACJfwEfwNFAJK6ZnavvKYgLoLlMK6EAUcJBXO8OwCBRhQugdTFE75T5K/H/9ntmEEP0nBNvDLA9DwA7k9Sc3S2y4srctugVxAWIxTVQRTz41AF1AXTcF4me28Hrn1nJLpKAtmW8FQVRi+YlB63EPZ5a9E6z+w2uHNv1DhiWpA1IfFm178HsUropA5Q/yeRUcTZyN5oFnCpXlU24wwPQWZCjKuvGkQNoi+ou0A3VKnKAVqJ2UeeAG+d9SRmOiS4YAAAAAElFTkSuQmCC"/>
                                            <span class="align-middle">O'chirish</span>
                                        </button>
                                    </form>

                                    <a href="{{ route('mentor.edit', $mentor->id) }}" class="btn btn-label-primary mt-2 m-2 text-white">
                                        {{-- <i class="bx bx-x"></i> --}}
                                        <img  src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAAAXNSR0IArs4c6QAAAN1JREFUSEvFlO0NwjAMBa8bwCQwAkzCKjACE8EIsAkbgJ6USKEkdj5a0T+V2vQufnY6sfI1rcxnRLABToDuV+CV22yvQNAbsA/QB3DMSXoEKfwZBDsgK2kVzOGHILgDklyAcxpVi6AUi3gxrm6BFYsE6oXiUkVfza6pwItFgixcLzxBDq4dlp7/TKolGIZbFSwCLwkWg5cEOjCa6bRx1ZnPm5DrwTss2oaR64aXKogCyYfgniCttjjn3u/eiih+2w2vOWjeBt333kl2Ad6Cmog8hjmZfxG07thcv3oPPg35Shmq75wnAAAAAElFTkSuQmCC"/>
                                        Tahrirlash
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr class="odd">
                                <td valign="top" colspan="7" class="dataTables_empty">No Mentor </td>
                            </tr>
                        @endforelse

                    </tbody >
                    <tbody class="searchdata"></tbody>
                </table>
                <script>
                    $('#search').on('keyup' , function() {
                        $value = $(this).val();
                        if($value){
                            $('.alldata').hide();
                            $('.searchdata').show();
                        }else{
                            $('.alldata').show();
                            $('.searchdata').hide();
                        }
                        $.ajax({
                            type:"get",
                            url:'{{URL::to('search')}}',
                            data: {'search': $value},
                            success: function(data){
                                console.log(data);
                                $('#content').html(data)
                            }
                        })
                    })
                </script>
            </div>

        </div>
    </div>

@endsection
