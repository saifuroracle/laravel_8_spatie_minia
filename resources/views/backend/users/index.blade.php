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
                    <h4 class="mb-sm-0 font-size-18">Users</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Users</li>
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
                            <button type="button" class="btn btn-success waves-effect waves-light mr-2">
                                <i class="fa fa-search"></i>
                            </button>
                            Search User
                        </h3>
                        {{Form::open(['method' => 'get'])}}
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="name" class="mb-2">Name</label>
                                    {!! Form::text('name', $request['name'] ?? '',['class'=>'form-control ', 'autocomplete'=>'off',  'placeholder'=>'Enter Name'])!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="from_date" class="mb-2">From Date</label>
                                    {!! Form::text('from_date', $request['from_date'] ?? '',['class'=>'form-control datepickerDMY', 'autocomplete'=>'off',  'placeholder'=>'DD-MM-YYYY'])!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="to_date" class="mb-2">To Date</label>
                                    {!! Form::text('to_date', $request['to_date'] ?? '',['class'=>'form-control datepickerDMY', 'autocomplete'=>'off',  'placeholder'=>'DD-MM-YYYY'])!!}
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-4"><i class="fa fa-search mr-2"></i>Filter Now</button>
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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body order-list">
                        <h3 class="header-title mt-0 mb-4">
                            {{-- <button type="button" class="btn btn-success waves-effect waves-light mr-2">
                                <i class="fa fa-agenda"></i>
                            </button> --}}
                            User List <span class="badge badge-pill badge-soft-primary"> {{ $tableData->total() }}</span>
                            @can('user-create')
                            <a href="{{ route('admin.users.create') }}" class="btn btn-success waves-effect waves-light px-4 d-inline-block float-right mr-3"><i class="fas fa-plus-circle mr-2"></i> Create</a>
                            @endcan
                        </h3>

                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    {{-- <th>Photo</th> --}}
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($tableData->count())
                                    @foreach($tableData as $key => $row)
                                        <tr>
                                            {{-- <td>
                                                @if($row->photo)
                                                    <img src="{{ asset('/storage/'.str_replace('user','user/thumbnails',$row->photo)) }}" alt="Image">
                                                @else
                                                    <img src="{{ asset('no-image.png') }}" alt="Image">
                                                @endif
                                            </td> --}}
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>
                                                @if(!empty($row->getRoleNames()))
                                                    @foreach($row->getRoleNames() as $v)
                                                        <label class="badge badge-success">{{ $v }}</label>
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td style='white-space: nowrap'>
                                                <a href="{{ route('admin.users.show',$row->id) }}" class="mr-2" title="View">
                                                    <i class="fa fa-eye text-info font-16"></i>
                                                </a>
                                                @can('user-edit')
                                                <a href="{{ route('admin.users.edit',$row->id) }}" class="mr-2" title="Edit">
                                                    <i class="fa fa-pencil-alt text-success font-16"></i>
                                                </a>
                                                @endcan
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>

                        </div>
                        <nav aria-label="Page navigation example" class="m-3">
                            <span>Showing {{ $tableData->appends($request)->firstItem() }} to {{ $tableData->appends($request)->lastItem() }} of {{ $tableData  ->appends($request)->total() }} entries</span>
                            <div>{{ $tableData->appends($request)->render() }}</div>
                        </nav>
                    </div>
                    <!--end card-body-->
                </div>
                <!--end card-->
            </div>
            <!--end col-->
        </div>
        <!--end row-->

@endsection
