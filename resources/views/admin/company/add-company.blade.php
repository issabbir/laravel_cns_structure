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
                        <h3 class="box-title"> Company Form</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal"  action="" method="post">
                        <div class="box-body">
                            {!! csrf_field() !!}
                            <div class="form-group row ">
                                <label class="col-sm-2 control-label" for="name">Company Name<span class="text-danger">*</span></label>
                                <div class="col-sm-8 {{ $errors->has('name') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" id="name" name="name" value="{{old('name', $company->name) }}" placeholder="Enter company name" autocomplete="off" maxlength="260">
                                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="nbr_regi_no">VAT Reg. No.<span class="text-danger">*</label>
                                <div class="col-sm-8 {{ $errors->has('nbr_regi_no') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control"  id="nbr_regi_no" name="nbr_regi_no" value="{{old('nbr_regi_no', $company->nbr_regi_no)}}" placeholder="Enter VAT registration No." autocomplete="off" maxlength="255">
                                    {!! $errors->first('nbr_regi_no', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="contact_person">Contact Person<span class="text-danger">*</label>
                                <div class="col-sm-8  {{ $errors->has('contact_person') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" id="contact_person" value="{{old('contact_person', $company->contact_person)}}" name="contact_person" placeholder="Enter contact person" autocomplete="off" maxlength="255">
                                    {!! $errors->first('contact_person', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="mobile">Mobile Number<span class="text-danger">*</span></label>
                                <div class="col-sm-8 {{ $errors->has('mobile') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" id="mobile" name="mobile" value="{{old('mobile', $company->mobile)}}" placeholder="Enter mobile number" autocomplete="off" maxlength="14">
                                    {!! $errors->first('mobile', '<p class="help-block">:message</p>') !!}
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-2 control-label" for="city">City<span class="text-danger">*</label>
                                <div class="col-sm-8 {{ $errors->has('city') ? 'has-error' : ''}}">
                                    <input type="text" class="form-control" id="city" name="city" value="{{old('city', $company->city)}}" placeholder="Enter city" autocomplete="off" maxlength="255">
                                    {!! $errors->first('city', '<p class="help-block">:message</p>') !!}
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
