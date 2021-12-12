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
            <h4 class="mb-sm-0 font-size-18">FAQ</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">FAQ</li>
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
                    Search FAQ
                </h3>
                {{Form::open(['method' => 'get'])}}
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="question" class="mb-2">Question</label>
                            {!! Form::text('question', request('question') ?? '',['class'=>'form-control', 'placeholder'=>'Question'])!!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="answer" class="mb-2">Answer</label>
                            {!! Form::text('answer', request('answer') ?? '',['class'=>'form-control', 'placeholder'=>'Answer'])!!}
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-4"><i class="fa fa-search mr-2"></i>Filter</button>
                            <a type="button" class="btn btn-danger waves-effect waves-light mt-4" href="{{ route('admin.faqs.index') }}">Clear</a>
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
            FAQ List <span class="badge badge-pill badge-soft-primary"> {{ $faqs->total() }}</span>
            @can('faq-create')
            <a href="{{ route('admin.faqs.create') }}" class="btn btn-success waves-effect waves-light px-4 d-inline-block float-right mr-3" ><i class="fas fa-plus-circle mr-2"></i>Create</a>
            @endcan
        </h3>

        <div class="table-responsive my-2">
            <table class="table table-centered mb-0">
                <thead>
                    <tr>
                        <th>Question</th>
                        <th>Answer</th>
                        <th>Priority</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($faqs->count()>0)
                        @foreach ($faqs as $i =>  $faq)
                            <tr>
                                <td>{{$faq->question}}</td>
                                <td>{{$faq->answer}}</td>
                                <td>{{$faq->priority}}</td>
                                <td>
                                    @include('includes.status', ['status' => [['key' => 'Active', 'value' => 1, 'class'=> 'badge-success'], ['key' => 'Inactive', 'value' => 0, 'class'=> 'badge-danger']], 'selected'=> $faq->status])
                                </td>
                                <td>
                                    @can('faq-edit')
                                        <a href="{{ route('admin.faqs.edit',$faq->id) }}" class="mr-2" title="Edit">
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

        @include('/includes/paginate', ['paginator' => $faqs])
    </div>
</div>
@endsection
