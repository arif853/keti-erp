@extends('layouts.main')
@section('contents')
     <!-- Page-Title -->
     <div class="row">
        <div class="col-md-6 col-lg-6 col-sm-6">
            <h2 class="pull-left page-title">Welcome !</h2>
        </div>
    </div>
    {{-- <div class="my-15">
        <hr>
    </div> --}}
    <!-- Start Widget -->
    <div class="row">
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-info"><i class="ion-social-usd"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">15852</span>
                    Total Sales
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Sales <span class="pull-right">60%</span></h5>
                        <div class="progress">
                            <div class="progress-bar " style="width: 60%;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-purple"><i class="ion-ios7-cart"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">956</span>
                    New Orders
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Orders <span class="pull-right">90%</span></h5>
                        <div class="progress">
                            <div class="progress-bar " style="width: 90%;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-success"><i class="ion-eye"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{$customers->count()}}</span>
                    Unique Customers
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase">Customers <span class="pull-right">10%</span></h5>
                        <div class="progress">
                            <div class="progress-bar " style="width: 10%;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-lg-3">
            <div class="mini-stat clearfix bx-shadow">
                <span class="mini-stat-icon bg-primary"><i class="ion-android-contacts"></i></span>
                <div class="mini-stat-info text-right text-muted">
                    <span class="counter">{{$users->count()}}</span>
                    New Users
                </div>
                <div class="tiles-progress">
                    <div class="m-t-20">
                        <h5 class="text-uppercase" >Users <span class="pull-right">1%</span></h5>
                        <div class="progress">
                            <div class="progress-bar " style="width: 1%;" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End row-->

    <div class="row">
        <!-- BAR Chart -->
        <div class="col-lg-12">
            <div class="panel panel-border panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Bar Chart   </h3>
                </div>
                <div class="panel-body">
                    <div id="morris-bar-example" style="height: 300px;"></div>
                </div>
            </div>
        </div> <!-- col -->
    </div>
@endsection
@push('dashboard')
    <script>

    </script>
@endpush
