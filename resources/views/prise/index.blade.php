@extends('layouts.app')
@section('content')
<div class="breadcrumbbar border">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">Prises</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="">prise</a></li>
                    <li class="breadcrumb-item"><a href="table-editable.html#">ro'yxati</a></li>
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                <button class="btn btn-primary-rgba"><i class="feather icon-plus mr-2"></i></button>
            </div>
        </div>
    </div>
</div>

<div class="contentbar">
    <!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h6>Sovrin yaratish</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered" id="edit-btn">
                            <thead>
                              <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Image</th>
                                <th>Description</th>
                                <th>BTN</th>

                              </tr>
                            </thead>
                            <tbody>
                                @isset($priseEdit)
                                    <form action="{{ route('prise.update',$priseEdit->id) }}" method="post" enctype="multipart/form-data">
                                        @method('put')
                                        @csrf
                                        <tr>
                                            <td>#</td>
                                            <td><input value="{{ $priseEdit->name }}" type="text" name="name" class="form-control m-0" required="required"></td>
                                            <td><input value="{{ $priseEdit->price }}" type="text" name="price" class="form-control m-0" required="required"></td>
                                            <td><input value="{{ $priseEdit->image }}" type="file" name="image" class="form-control m-0" required="required"></td>
                                            <td><input value="{{ $priseEdit->description }}" type="text" name="description" class="form-control m-0" required="required"></td>

                                            <td><button class="btn btn-primary">Update</button></td>
                                    </form>
                                @endisset
                                {{-- @if(!$studentEdit) --}}
                                <form action="{{ route('prise.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('POST')
                                    <tr>
                                        <td>#</td>
                                        <td><input type="text" name="name" class="form-control m-0" required="required"></td>
                                        <td><input type="text" name="price" class="form-control m-0" required="required"></td>
                                        <td><input type="file" name="image" class="form-control m-0" required="required"></td>
                                        <td><input type="description" name="description" class="form-control m-0" required="required"></td>

                                        <td><button class="btn btn-primary">Create</button></td>
                                </form>
                                {{-- @endif --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title">Hamma sovrinlar ro'yxati</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive form-control">
                        @forelse($prises as $prise)
                            <div class="card" style="width: 18rem;">
                            <img class="card-img-top" src="{{'http://abbostraining/newTraininggithub/public/'}}{{ $prise->image }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $prise->name }}</h5>
                                <p class="card-text">{{ $prise->description }}.</p>
                                <a href="{{ route('prise.edit',$prise->id) }}" class="btn btn-primary">Go edit</a>
                            </div>
                            </div>
                        @empty

                        @endforelse
                    </div>

                </div>
            </div>
        </div>
</div>


@endsection
