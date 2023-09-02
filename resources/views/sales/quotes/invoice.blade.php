@extends('layouts.main')
@section('contents')

 <!-- Page-Title -->
 {{-- <div class="row">
    <div class="col-sm-12">
        <h4 class="pull-left page-title">Invoice</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#">Moltran</a></li>
            <li><a href="#">Pages</a></li>
            <li class="active">Invoice</li>
        </ol>
    </div>
</div> --}}
@foreach ($quotation as $data)

@endforeach
<div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
        <div class="panel panel-default">
            {{-- <div class="panel-heading">
                <h4>Quote</h4>
            </div> --}}
            <div class="panel-body">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-left">KETI ERP System</h4>
                        <h6 class="">36/A Harson Road, Merrly 154312</h6>
                        <h6 class="">P: {{$data->phone}}, {{$data->phone2}}, <span>Email: {{$data->email}}</span></h6>
                    </div>
                    <div class="pull-right">
                        <h4>Quote # <br>
                            <strong>{{$data->quotation}}</strong>
                        </h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="pull-left m-t-30">
                            <address>
                              <strong>{{$data->business_name}}</strong><br>
                              {{$data->del_address}}<br>
                              <abbr title="Phone">P:</abbr> {{$data->phone}}
                              </address>
                        </div>
                        <div class="pull-right m-t-30">
                            <p><strong>Date: </strong> {{$data->quote_date}}</p>
                            {{-- <p class="m-t-10"><strong>Status: </strong> <span class="label label-pink">Pending</span></p> --}}
                            {{-- <p class="m-t-10"><strong>Order ID: </strong> #123456</p> --}}
                        </div>
                    </div>
                </div>
                <div class="m-h-50"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                    <tr><th>#</th>
                                        <th>Item</th>
                                        <th>Description</th>
                                        <th>Quantity</th>
                                        <th>Unit Cost</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalPrice = 0;
                                    @endphp
                                    @foreach ($quotation as $key => $items )
                                        <tr>
                                            <td>{{$key}}</td>
                                            <td>{{$items->items}}</td>
                                            <td>{{$items->description}}</td>
                                            <td>{{$items->quantity}}</td>
                                            <td>{{$items->price}}</td>
                                            <td>{{$items->quantity * $items->price}}</td>
                                        </tr>
                                        @php
                                            $totalPrice += $items->quantity * $items->price;
                                        @endphp
                                    @endforeach


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" style="border-radius: 0px; margin-top:30px;">
                    <div class="col-lg-8"></div>
                    <div class="col-lg-2">
                        <p class="text-right"><b >Sub-total:</b></p>
                    </div>
                    <div class="col-lg-2">
                        {{-- <input type="text" class="form-control" value="{{$totalPrice}}" disabled> --}}
                        <p>{{$totalPrice}}</p>
                    </div>
                </div>
                <div class="footer-note text-center m-t-10">
                    <h3><span>Additional Note</span></h3>
                </div>
                <hr>
                <div class="qfooter text-center">
                   <h6>A finance charge of 1.5% will be made on unpaid balances after 30 days</h6>
                </div>
            </div>
        </div>

    </div>
    <div class="col-lg-2"></div>

    <div class="">
        <a href="#" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
        <a href="#" class="btn btn-primary waves-effect waves-light">Submit</a>
    </div>
</div>

@endsection
@push('quote.voice')

    <script>


    </script>

@endpush
