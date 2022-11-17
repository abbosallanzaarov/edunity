@extends('layouts.mentorlayout')
@section('mentorcontent')

     <!-- END STATISTIC-->

     <section class="au-breadcrumb m-t-75">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="au-breadcrumb-content">
                            <div class="au-breadcrumb-left">
                                <span class="au-breadcrumb-span">You are here:</span>
                                <ul class="list-unstyled list-inline au-breadcrumb__list">
                                    <li class="list-inline-item active">
                                        <a href="#">Home</a>
                                    </li>
                                    <li class="list-inline-item seprate">
                                        <span>/</span>
                                    </li>
                                    <li class="list-inline-item">Dashboard</li>
                                </ul>
                            </div>
                            <button class="au-btn au-btn-icon au-btn--green">
                                <i class="zmdi zmdi-plus"></i>add item</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END BREADCRUMB-->

    <!-- STATISTIC-->
    <div class="row ">
    @foreach ($group as $group)
    <div class="col-md-4">
        <div class="card" style="width: 18rem;">
            <i class="fas fa-copy"></i>
            <div class="card-body">
              <h5 class="card-title">{{$group->name}}</h5>
              <p class="card-text">{{$group->mentor_id}}.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
    </div>

    @endforeach
</div>

@endsection

