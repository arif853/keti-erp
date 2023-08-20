@extends('layouts.main')
@section('contents')

<div class="row">
    <div class="col-lg-12">
        <h2 class="pull-left page-title">Customer Page</h2>
        <nav aria-label="breadcrumb ">
            <ol class="breadcrumb pull-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Library</li>
            </ol>
        </nav>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading d-flex justify-content-between">
                <h3 class="panel-title ">Customer Details</h3>
                <a href="{{('/ledger/customer')}}" class="btn btn-danger waves-effect waves-light ">Back</a>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <div class="panel">
            @foreach ($data as $item)

            @endforeach
            <div class="panel panel-body">
                <div class="row">
                    <div class="col-md-1">
                            <div class="form-group">
                                <label for="customar_id" class="control-label">ID</label>
                                <input type="text" class="form-control" id="customar_id"  value="{{$item->id}}" disabled>
                            </div>
                        </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="business_name" class="control-label">Business Name*</label>
                            <input type="text" class="form-control" id="business_name" value="{{$item->business_name}}" placeholder="Business Name"
                                name="business_name" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="phone" class="control-label">Primary Phone*</label>
                        <input type="text" class="form-control" id="phone" value="{{$item->phone}}" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="reference" class="control-label">Reference</label>
                        <input type="text" class="form-control" value="{{$item->reference}}" id="reference" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="credit_limit" class="control-label">Credit Limit</label>
                        <input type="text" value="{{$item->credit_limit}}" class="form-control alert-success" id="credit_limit" disabled>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="owner_name" class="control-label">Owner Name*</label>
                            <input type="text" class="form-control" id="owner_name" value="{{$item->owner_name}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="email" class="control-label">Email</label>
                        <input type="email" class="form-control" value="{{$item->email}}" id="email" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="phone2" class="control-label">Secondary Phone</label>
                        <input type="text" class="form-control" placeholder="+880 " id="phone2" value="{{$item->phone2}}" disabled>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="acc_group" class="control-label">Account Group</label>
                            <input type="text"  class="form-control alert-success" id="acc_group" value="{{$item->acc_group}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <label for="open_balance" class="control-label">Opening Balance</label>
                        <input type="text" min="0" class="form-control alert-success" id="open_balance" value="{{$item->open_balance}}" disabled>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-5">
                        <label for="address2" class="control-label">Delivary Address*</label>
                        <textarea type="text" class="form-control" id="address2" disabled>{{$item->del_address}}</textarea>
                        <div id="saveform_errlist" class="address2"></div>
                    </div>
                    <div class="col-md-2">
                        <label for="t_license" class="control-label">Trade License</label>
                        <input type="text" class="form-control " placeholder="Trade License " id="t_license" value="{{$item->t_license}}" disabled>
                    </div>
                    <div class="col-md-2">
                        <label for="tin_number" class="control-label">TIN Number</label>
                        <input type="text" class="form-control " placeholder="Tin Number " id="tin_number" value="{{$item->tin}}" disabled>
                    </div>
                </div>
                <hr>
                <p class="control-label text-info">Contact person/Manager</p>
                <div class="row">
                    <div class="col-md-3">
                        <label for="man_name" class="control-label">Name</label>
                        <input type="text" class="form-control " placeholder="Name " id="man_name" value="{{$item->man_name}}" @disabled(true)>
                    </div>
                    <div class="col-md-3">
                        <label for="man_phone" class="control-label">Phone Number</label>
                        <input type="text" class="form-control " placeholder="Phone Number " id="man_phone" value="{{$item->man_phone}}" @disabled(true)>
                    </div>
                    <div class="col-md-3">
                        <label for="man_title" class="control-label">Title</label>
                        <input type="text" class="form-control " placeholder="Title" id="man_title"name="{{$item->man_title}}" @disabled(true)>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
