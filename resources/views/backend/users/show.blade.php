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
                    <h4 class="mb-sm-0 font-size-18">User Data</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                            <li class="breadcrumb-item active">User Data</li>
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
                        <h3 class="header-title mt-0 mb-4">
                            {{-- <button type="button" class="btn btn-success waves-effect waves-light mr-2">
                                <i class="ti-agenda"></i>
                            </button> --}}
                            Show User Details

                        </h3>
                        <table class="table table-striped valign-top mt-3">
                            <tbody>
                            <tr>
                                <td class="text-dark font-weight-bold">Name</td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td class="text-dark font-weight-bold">Email</td>
                                <td>{{ $user->email }}</td>
                            </tr>

                            <tr>
                                <td class="text-dark font-weight-bold">Roles</td>
                                <td>
                                    @if(!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $role)
                                            <label class="badge badge-success">{{ $role }}</label>
                                        @endforeach
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="text-dark font-weight-bold">Contact No</td>
                                <td>{{ $user->contact }}</td>
                            </tr>
                            <tr>
                                <td class="text-dark font-weight-bold">Created Date</td>
                                <td>{{ dateConvertDBtoForm($user->created_at) }}</td>
                            </tr>


                            </tbody>
                        </table>
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
