@extends('layouts.studentlayout')

@section('content')
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin">
                <div class="row">
                    <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                        <h3 class="font-weight-bold">Topshiriqlar</h3>
                        <h6 class="font-weight-normal mb-0">
                            <span class="text-primary">.</span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <p class="card-title mb-0">Bu guruh uchun mavzular ro'yxati</p>
                        <div class="table-responsive">
                            <table class="table table-striped table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Mavzu</th>
                                        <th>Vaqti</th>
                                        <th>Mashqlar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($tema as $tema)
                                    <tr>
                                        <td>#</td>
                                        <td class="font-weight-bold">{{ $tema->name }}</td>
                                        <td>{{ $tema->created_at }}</td>
                                        <td class="font-weight-medium">
                                            <a href="{{ route('student.mytasks.show',$tema->id) }}" class="badge badge-success p-2">Mashqlar</div>
                                        </td>
                                    </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



{{-- <div class="row">
    <div class="col-md-7 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <p class="card-title mb-0">Top Products</p>
                <div class="table-responsive">
                    <table class="table table-striped table-borderless">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Search Engine Marketing</td>
                                <td class="font-weight-bold">$362</td>
                                <td>21 Sep 2018</td>
                                <td class="font-weight-medium">
                                    <div class="badge badge-success">Completed</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Search Engine Optimization</td>
                                <td class="font-weight-bold">$116</td>
                                <td>13 Jun 2018</td>
                                <td class="font-weight-medium">
                                    <div class="badge badge-success">Completed</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Display Advertising</td>
                                <td class="font-weight-bold">$551</td>
                                <td>28 Sep 2018</td>
                                <td class="font-weight-medium">
                                    <div class="badge badge-warning">Pending</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Pay Per Click Advertising</td>
                                <td class="font-weight-bold">$523</td>
                                <td>30 Jun 2018</td>
                                <td class="font-weight-medium">
                                    <div class="badge badge-warning">Pending</div>
                                </td>
                            </tr>
                            <tr>
                                <td>E-Mail Marketing</td>
                                <td class="font-weight-bold">$781</td>
                                <td>01 Nov 2018</td>
                                <td class="font-weight-medium">
                                    <div class="badge badge-danger">Cancelled</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Referral Marketing</td>
                                <td class="font-weight-bold">$283</td>
                                <td>20 Mar 2018</td>
                                <td class="font-weight-medium">
                                    <div class="badge badge-warning">Pending</div>
                                </td>
                            </tr>
                            <tr>
                                <td>Social media marketing</td>
                                <td class="font-weight-bold">$897</td>
                                <td>26 Oct 2018</td>
                                <td class="font-weight-medium">
                                    <div class="badge badge-success">Completed</div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">To Do Lists</h4>
                <div class="list-wrapper pt-2">
                    <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                        <li>
                            <div class="form-check form-check-flat">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Meeting with Urban Team
                                <i class="input-helper"></i></label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check form-check-flat">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked="">
                                    Duplicate a project for new customer
                                <i class="input-helper"></i></label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li>
                            <div class="form-check form-check-flat">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Project meeting with CEO
                                <i class="input-helper"></i></label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li class="completed">
                            <div class="form-check form-check-flat">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox" checked="">
                                    Follow up of team zilla
                                <i class="input-helper"></i></label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                        <li>
                            <div class="form-check form-check-flat">
                                <label class="form-check-label">
                                    <input class="checkbox" type="checkbox">
                                    Level up for Antony
                                <i class="input-helper"></i></label>
                            </div>
                            <i class="remove ti-close"></i>
                        </li>
                    </ul>
                </div>
                <div class="add-items d-flex mb-0 mt-2">
                    <input type="text" class="form-control todo-list-input" placeholder="Add new task">
                    <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
                </div>
            </div>
        </div>
    </div>
</div> --}}
