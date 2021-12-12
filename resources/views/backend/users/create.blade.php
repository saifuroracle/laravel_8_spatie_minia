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
                    <h4 class="mb-sm-0 font-size-18">User Create</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">User Create</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body order-list">
                        <h3 class="header-title mt-0 mb-3">
                            {{-- <button type="button" class="btn btn-success waves-effect waves-light mr-2">
                                <i class="ti-map-alt"></i>
                            </button> --}}
                            Add New User
                        </h3>
                        {{ Form::open(['route' => 'admin.users.store','id'=>'users-form','files'=>'true']) }}

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
                                    <input type="file" id="photo" class="form-control mb-3" name="photo" accept="image/*"/>
                                    @if($errors->has('photo'))
                                        <strong style="color:red;">{{ $errors->first('photo') }}</strong>
                                    @endif
                                </div>
                            </div> --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="mb-2">Password</label>
                                    {!! Form::password('password', ['class'=>'form-control','placeholder' => 'Enter Password','id'=>'password']);!!}
                                    @if($errors->has('password'))
                                        <strong style="color:red;">{{ $errors->first('password') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="confirm_password" class="mb-2">Confirm Password</label>
                                    {!! Form::password('confirm_password', ['class'=>'form-control','placeholder' => 'Enter Confirm Password','id'=>'confirm_password']);!!}
                                    @if($errors->has('confirm_password'))
                                        <strong style="color:red;">{{ $errors->first('confirm_password') }}</strong>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="roles" class="mb-2">Roles</label>
                                    {!! Form::select('roles', $roleList,   old('roles'), ['class'=>'select2 form-control mb-3 custom-select','id'=>'roles']);!!}
                                    @if($errors->has('roles'))
                                        <strong style="color:red;">{{ $errors->first('roles') }}</strong>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="row">
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
@endsection
@push('custom_script')

@endpush
