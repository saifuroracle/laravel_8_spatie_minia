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
            <h4 class="mb-sm-0 font-size-18">Thana</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Thana</li>
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
                    Search Thana
                </h3>
                {{Form::open(['method' => 'get'])}}
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">District</label>
                            {!! Form::select('district_id', ['' => 'Select district']+ $parentdistricts, request('district_id'), ['id' =>'district_id','class' => 'form-control select2']) !!}
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

<div class="card mt-2">
    <div class="card-body">

        <h3 class="header-title mt-0 mb-4">
            Thana List <span class="badge badge-pill badge-soft-primary"> {{ $thanas->total() }}</span>
            @can('thana-create')
            <a href="{{ route('admin.thanas.create') }}" class="btn btn-success waves-effect waves-light px-4 d-inline-block float-right mr-3" ><i class="fas fa-plus-circle mr-2"></i>Create</a>
            @endcan
        </h3>

        <div class="table-responsive my-2">
            <table class="table table-centered mb-0">
                <thead>
                    <tr>
                        <th>District</th>
                        <th>Thana EN</th>
                        <th>Thana BN</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($thanas->count()>0)
                        @foreach ($thanas as $i =>  $thana)
                            <tr>
                                <td>{{ $thana->district->district_en }}</td>
                                <td>{{$thana->thana_en}}</td>
                                <td>{{$thana->thana_bn}}</td>
                                <td>{{dateConvertDBtoForm($thana->start_date)}}</td>
                                <td>{{dateConvertDBtoForm($thana->end_date)}}</td>
                                <td>
                                    @can('thana-edit')
                                        <a href="{{ route('admin.thanas.edit',$thana->id) }}" class="mr-2" title="Edit">
                                            <i class="fa fa-pencil-alt text-success font-16"></i>
                                        </a>
                                    @endcan

                                    @can('thana-delete')
                                        {!! Form::open(['method' => 'DELETE','route' => ['admin.thanas.destroy', $thana->id],'style'=>'display:inline', 'onclick'=>"return confirm('Are you sure?')"]) !!}
                                            {{ Form::button('<i class="fa fa-trash text-danger" title="Delete"></i>', ['type' => 'submit', 'class' => 'btn btn-text btn-sm'] )  }}
                                        {!! Form::close() !!}
                                    @endcan
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>

        @include('/includes/paginate', ['paginator' => $thanas])
    </div>
</div>
@endsection
