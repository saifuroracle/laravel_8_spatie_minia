@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.leftsidebar')
@extends('layouts.rightsidebar')
@extends('layouts.footer')

@section('content')
    <div class="container-fluid">
        <!-- Page-Title -->
        {{-- <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <div class="float-right">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Marks Quiz Carnival</a></li>
                            <li class="breadcrumb-item active">Roles</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Role List</h4></div>
                <!--end page-title-box-->
            </div>
            <!--end col-->
        </div> --}}
        <!--end row-->
        <!-- end page title end breadcrumb -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body order-list">
                        <h3 class="header-title mt-0 mb-4">
                            {{-- <button type="button" class="btn btn-success waves-effect waves-light mr-2">
                                <i class="ti-agenda"></i>
                            </button> --}}
                            Role List <span class="badge badge-pill badge-soft-primary"> {{ $tableData->total() }}</span>
                            @can('role-create')
                            <a href="{{ route('admin.roles.create') }}" class="btn btn-success waves-effect waves-light px-4 d-inline-block float-right mr-3">Create</a>
                            @endcan
                        </h3>

                        <div class="table-responsive">
                            <table class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if($tableData->count())
                                    @foreach($tableData as $key => $row)
                                        <tr>
                                            <td>{{ $row->name }}</td>
                                            <td>

                                                <a href="{{ route('admin.roles.show',$row->id) }}" class="mr-2" title="View">
                                                    <i class="fa fa-eye text-success font-16"></i>
                                                </a>
                                                @can('role-edit')
                                                    <a href="{{ route('admin.roles.edit',$row->id) }}" class="mr-2" title="Edit">
                                                        <i class="fa fa-pencil-alt text-primary font-16"></i>
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
    </div>

@endsection
