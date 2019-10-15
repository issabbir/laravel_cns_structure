@extends('layouts.dashboard')


@if(Session::has('message'))
<div class="alert alert-danger   show" role="alert">
    {{ Session::get('message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if($errors->has('exception'))
<div class="alert alert-danger show"role="alert">
    {!! $errors->first('exception') !!}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@section('content')
<div class="container-fluid spark-screen">
        <div class="row">
            <div class="col-md-offset-0 col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title"> Store Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal"  action="" method="post">
                        <div class="box-body">
                            {!! csrf_field() !!}
                            <div class="form-group row ">
                                <label class="col-sm-2 control-label" for="name">Store Name<span class="text-danger">*</span></label>
                                <div class="col-sm-8 {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $store->name) }}" placeholder="Enter Store name" autocomplete="off" maxlength="260">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="address">Address<span class="text-danger">*</label>
                                <div class="col-sm-8 {{ $errors->has('address') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control"  id="address" name="address" value="{{old('address', $store->address)}}" placeholder="Enter Address" autocomplete="off" maxlength="255">
                                    {!! $errors->first('address', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="type">Type<span class="text-danger">*</label>
                                <div class="col-sm-8  {{ $errors->has('type') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" id="type" value="{{old('type', $store->type)}}" name="type" placeholder="Enter Type" autocomplete="off" maxlength="255">
                                    {!! $errors->first('type', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="company_id">Company Name<span class="text-danger">*</span></label>
                                <div class="col-sm-8 {{ $errors->has('company_id') ? 'has-error' : ''}}">
                                    <select  class="form-control" name="company_id" id="company_id">
                                        <option value="">Select Company</option>
                                        @foreach ($companylist as $item)
                                            <option @if ( $item->id == $store->company_id || $item->id == old('company_id')) selected="selected" @endif value="{{$item->id}}">{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                    {!! $errors->first('company_id', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-offset-5 col-md-7">
                                <button type="submit" name="save" id="save" class="btn btn-success  margin"><i class="fa fa-credit-card"></i> Save</button>
                                <a href="{{route('company-list')}}" class="btn btn-danger margin"><i class="fa fa-close"></i> Cancel</a>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--------------->
@endsection
