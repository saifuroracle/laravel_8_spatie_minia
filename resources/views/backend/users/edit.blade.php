@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.leftsidebar')
@extends('layouts.rightsidebar')
@extends('layouts.footer')

@section('content')

    <div class="container-fluid">


        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">User Edit</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">User</a></li>
                            <li class="breadcrumb-item active">User Edit</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-body order-list">
                        <h3 class="header-title mt-0 mb-3">
                            {{-- <button type="button" class="btn btn-success waves-effect waves-light mr-2">
                                <i class="ti-map-alt"></i>
                            </button> --}}
                            Edit Users
                        </h3>
                        {{ Form::model($editModeData,['route' =>['admin.users.update',$editModeData->id ],'method' => 'PUT','files'=>'true','id'=>'users-form'])}}

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name" class="mb-2">Name</label>
                                    {!! Form::text( 'name', old('name'), $attributes = ['class'=>'form-control','id'=>'name','placeholder'=>'Enter Name']) !!}
                                    @if($errors->has('name'))
                                        <strong style="color:red;">{{ $errors->first('name') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email" class="mb-2">Email</label>
                                    {!! Form::text('email',  old('email'), ['class'=>'form-control','placeholder' => 'Enter Email','id'=>'email']);!!}
                                    @if($errors->has('email'))
                                        <strong style="color:red;">{{ $errors->first('email') }}</strong>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="contact" class="mb-2">Contact</label>
                                    {!! Form::tel('contact',  old('contact'), ['class'=>'form-control','placeholder' => 'Enter Contact','id'=>'contact']);!!}
                                    @if($errors->has('contact'))
                                        <strong style="color:red;">{{ $errors->first('contact') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="photo" class="mb-2">Photo</label>
                                    <br>
                                    <input type="file" id="photo" class="form-control mb-3" name="photo" accept="image/*"/>
                                    @if($errors->has('photo'))
                                        <strong style="color:red;">{{ $errors->first('photo') }}</strong>
                                    @endif
                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roles" class="mb-2">Roles</label>
                                    {!! Form::select('roles[]', $roles,$userRole,['class'=>'select2 form-control mb-3 custom-select','placeholder' => 'SELECT ONE','id'=>'roles']);!!}
                                    @if($errors->has('roles'))
                                        <strong style="color:red;">{{ $errors->first('roles') }}</strong>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="mb-2">Status</label>
                                    {!! Form::select('status', [1 => 'Active',0 => 'Inactive'],   old('status'), ['class'=>'select2 form-control mb-3 custom-select','placeholder' => 'SELECT ONE','id'=>'status']);!!}
                                    @if($errors->has('status'))
                                        <strong style="color:red;">{{ $errors->first('status') }}</strong>
                                    @endif
                                </div>
                            </div> --}}
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
