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
            <h4 class="mb-sm-0 font-size-18">Slide Edit</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.slides.index') }}">Slides</a></li>
                    <li class="breadcrumb-item active">Slide Edit</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


    <div class="container-fluid">

        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-body order-list">
                        <h3 class="header-title mt-0 mb-5 text-center">
                            Edit Slide
                        </h3>
                        {{ Form::model($editModeData,['route' =>['admin.slides.update',$editModeData->id ],'method' => 'PUT','files'=>'true','id'=>'slides-form'])}}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group row required">
                                    <label class="col-sm-4 col-form-label control-label">Title</label>
                                    <div class="col-sm-8">
                                        {{Form::text('slide_title', $editModeData->slide_title, ['class' => 'form-control', 'required' => 'required'])}}
                                        @if($errors->has('slide_title'))
                                            <strong style="color:red;">{{ $errors->first('slide_title') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row required">
                                    <label for="slide" class="col-sm-4 col-form-label control-label">Slide Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="slide" class="form-control mb-3" name="slide" accept="image/*" />
                                        @if($errors->has('slide'))
                                            <strong style="color:red;">{{ $errors->first('slide') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="ti-check-box mr-2"></i>Update</button>
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

@push('custom_script')

@endpush
