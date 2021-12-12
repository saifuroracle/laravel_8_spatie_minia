@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.leftsidebar')
@extends('layouts.rightsidebar')
@extends('layouts.footer')

@section('content')

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Thana Create</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.thanas.index') }}">Thana</a></li>
                    <li class="breadcrumb-item active">Thana Create</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

    <div class="container-fluid">

        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-body order-list">
                        <h3 class="header-title mt-0 mb-3">

                            Add New Thana
                        </h3>
                        {{ Form::open(['route' => 'admin.thanas.store','id'=>'roles-form']) }}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label for="role" class="col-sm-4 col-form-label control-label">District</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('district_id', ['' => 'Select district']+ $parentdistricts, null, ['id' =>'district_id','class' => 'form-control select2', 'required' => 'required']) !!}
                                        @if($errors->has('district_id'))
                                            <strong style="color:red;">{{ $errors->first('district_id') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label class="col-sm-4 col-form-label control-label">Thana EN</label>
                                    <div class="col-sm-8">
                                        {{Form::text('thana_en', '', ['class' => 'form-control', 'required' => 'required'])}}
                                        @if($errors->has('thana_en'))
                                            <strong style="color:red;">{{ $errors->first('thana_en') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label class="col-sm-4 col-form-label control-label">Thana BN</label>
                                    <div class="col-sm-8">
                                        {{Form::text('thana_bn', '', ['class' => 'form-control'])}}
                                        @if($errors->has('thana_bn'))
                                            <strong style="color:red;">{{ $errors->first('thana_bn') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label class="col-sm-4 col-form-label control-label">Start Date</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('start_date', '', ['id' =>'start_date','class' => 'form-control datepicker', 'placeholder' => 'Start Date', 'required' => 'required', 'autocomplete'=>'off']) !!}
                                        @if($errors->has('start_date'))
                                            <strong style="color:red;">{{ $errors->first('start_date') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label class="col-sm-4 col-form-label control-label">End Date</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('end_date', '', ['id' =>'end_date','class' => 'form-control datepicker', 'placeholder' => 'End Date', 'required' => 'required', 'autocomplete'=>'off']) !!}
                                        @if($errors->has('end_date'))
                                            <strong style="color:red;">{{ $errors->first('end_date') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-12 text-right">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="ti-check-box mr-2"></i>Save Now</button>
                                </div>
                            </div>
                        </div>
                        <!--end /div-->
                        {{ Form::close() }}
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->
    </div>



@endsection
