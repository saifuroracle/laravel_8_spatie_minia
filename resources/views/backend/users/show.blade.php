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
                            <li class="breadcrumb-item active">Users</li>
                        </ol>
                    </div>
                    <h4 class="page-title">User Details</h4></div>
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
