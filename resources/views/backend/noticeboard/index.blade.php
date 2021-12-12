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
            <h4 class="mb-sm-0 font-size-18">Notice Board</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Notice Board</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="card mt-2">
    <div class="card-body">

        <h3 class="header-title mt-0 mb-4">
            Notice Board List <span class="badge badge-pill badge-soft-primary"> {{ $noticeboards->total() }}</span>
            @can('notice-board-create')
            <a href="{{ route('admin.noticeboards.create') }}" class="btn btn-success waves-effect waves-light px-4 d-inline-block float-right mr-3" ><i class="fas fa-plus-circle mr-2"></i>Create</a>
            @endcan
        </h3>

        <div class="table-responsive my-2">
            <table class="table table-centered mb-0">
                <thead>
                    <tr>
                        <th>Notice</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($noticeboards->count()>0 )
                        @foreach ($noticeboards as $i =>  $noticeboard)
                            <tr>
                                <td>{{$noticeboard->notice}}</td>
                                <td>
                                    @include('includes.status', ['status' => [['key' => 'Active', 'value' => 1, 'class'=> 'badge-success'], ['key' => 'Inactive', 'value' => 0, 'class'=> 'badge-danger']], 'selected'=> $noticeboard->status])
                                </td>
                                <td>
                                    @can('notice-board-edit')
                                        <a href="{{ route('admin.noticeboards.edit',$noticeboard->id) }}" class="mr-2" title="Edit">
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

        @include('/includes/paginate', ['paginator' => $noticeboards])
    </div>
</div>
@endsection
