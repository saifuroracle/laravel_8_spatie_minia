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
            <h4 class="mb-sm-0 font-size-18">FAQ Create</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.faqs.index') }}">FAQ</a></li>
                    <li class="breadcrumb-item active">FAQ Create</li>
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

                            Add New FAQ
                        </h3>
                        {{ Form::open(['route' => 'admin.faqs.store','id'=>'faqs-form']) }}

                        <div class="row">


                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label class="col-sm-4 col-form-label control-label">Question</label>
                                    <div class="col-sm-8">
                                        {{Form::text('question', '', ['class' => 'form-control', 'required' => 'required'])}}
                                        @if($errors->has('question'))
                                            <strong style="color:red;">{{ $errors->first('question') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label class="col-sm-4 col-form-label control-label">Answer</label>
                                    <div class="col-sm-8">
                                        {{Form::text('answer', '', ['class' => 'form-control', 'required' => 'required'])}}
                                        @if($errors->has('answer'))
                                            <strong style="color:red;">{{ $errors->first('answer') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label class="col-sm-4 col-form-label control-label">Priority</label>
                                    <div class="col-sm-8">
                                        {{Form::number('priority', '', ['class' => 'form-control', 'required' => 'required'])}}
                                        @if($errors->has('priority'))
                                            <strong style="color:red;">{{ $errors->first('priority') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label class="col-sm-4 col-form-label control-label">Status</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('status', [  1 => 'Active', 0 => 'Inactive' ], '', ['class' => 'form-control', 'required' => 'required']) !!}
                                        @if($errors->has('status'))
                                            <strong style="color:red;">{{ $errors->first('status') }}</strong>
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
