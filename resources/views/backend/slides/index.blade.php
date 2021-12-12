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
            <h4 class="mb-sm-0 font-size-18">Slides</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Slides</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->

<div class="card mt-2">
    <div class="card-body">

        <h3 class="header-title mt-0 mb-4">
            Slide List <span class="badge badge-pill badge-soft-primary"> {{ $slides->total() }}</span>
            @can('slide-create')
            <a href="{{ route('admin.slides.create') }}" class="btn btn-success waves-effect waves-light px-4 d-inline-block float-right mr-3" ><i class="fas fa-plus-circle mr-2"></i>Create</a>
            @endcan
        </h3>

        <div class="table-responsive my-2">
            <table class="table table-centered mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($slides->count()>0)
                        @foreach ($slides as $i =>  $slide)
                            <tr>
                                <td>{{ $slide->slide_title }}</td>
                                <td>
                                    <a href="{{ asset('storage/'.$slide->slide_image) }}" data-lightbox="image-1" data-title="My caption" class="magnify">
                                        <img src="{{ asset('storage/'.$slide->slide_image) }}" alt="" height="30" >
                                    </a>
                                </td>
                                <td>
                                    @can('slide-edit')
                                        <a href="{{ route('admin.slides.edit',$slide->id) }}" class="mr-2" title="Edit">
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

        @include('/includes/paginate', ['paginator' => $slides])
    </div>
</div>
@endsection
