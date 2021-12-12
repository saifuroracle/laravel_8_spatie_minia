@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.leftsidebar')
@extends('layouts.rightsidebar')
@extends('layouts.footer')

@section('content')

<script src="{{ asset('/assets/libs/jquery/jquery.min.js') }}"></script>

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18">Event Schedules</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Event Schedules</li>
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
                    Search Event Schedules
                </h3>
                {{Form::open(['method' => 'get'])}}
                <div class="row">


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">Division</label>
                            {!! Form::select('division_id', ['' => 'Select Division']+ $parentdivisions, request('division_id'), ['id'=>'division_id','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">District</label>
                            {!! Form::select('district_id', ['' => 'Select District']+ $parentdistricts, request('district_id'), ['id'=>'district_id','class' => 'form-control ']) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">Thana</label>
                            {!! Form::select('thana_id', ['' => 'Select Thana']+$parentthanas, request('thana_id'), ['id'=>'thana_id','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-4"><i class="fa fa-search mr-2"></i>Filter</button>
                            <a type="button" class="btn btn-danger waves-effect waves-light mt-4" href="{{ route('admin.event.schedules.index') }}">Clear</a>
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
            Event Schedule List <span class="badge badge-pill badge-soft-primary"> {{ $eventschedules->total() }}</span>
            @can('event-schedules-create')
            <a href="{{ route('admin.event.schedules.create') }}" class="btn btn-success waves-effect waves-light px-4 d-inline-block float-right mr-3" ><i class="fas fa-plus-circle mr-2"></i>Create</a>
            @endcan
        </h3>

        <div class="table-responsive my-2">
            <table class="table table-centered mb-0">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Division</th>
                        <th>District</th>
                        <th>Thanas</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($eventschedules->count()>0)
                        @foreach ($eventschedules as $i =>  $eventschedule)
                            <tr>
                                <td>{{dateConvertDBtoForm($eventschedule->schedule_date)}}</td>
                                <td>{{$eventschedule->division ? $eventschedule->division->division_en : ''}}</td>
                                <td>{{$eventschedule->district ? $eventschedule->district->district_en : ''}}</td>
                                <td>{{ $eventschedule->thanas }}</td>
                                <td>
                                    @include('includes.status', ['status' => [['key' => 'Active', 'value' => 1, 'class'=> 'badge-success'], ['key' => 'Inactive', 'value' => 0, 'class'=> 'badge-danger']], 'selected'=> $eventschedule->status])
                                </td>
                                <td>
                                    @can('event-schedules-edit')
                                        <a href="{{ route('admin.event.schedules.edit', $eventschedule->id) }}" class="mr-2" title="Edit">
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

        @include('/includes/paginate', ['paginator' => $eventschedules])
    </div>
</div>



<script type="text/javascript">


    $(document).ready(function() {
        $('select[name="division_id"]').on('change', function(){
            var division_id = $(this).val();
            console.log(division_id);
            if(division_id) {
                $.ajax({
                    url: '/devisionToDistrictWID/'+division_id,
                    type:"GET",
                    dataType:"json",
                    beforeSend: function(){
                        $('#loader').css("visibility", "visible");
                    },

                    success:function(data) {
                        console.log(data);

                        $('select[name="district_id"]').empty();
                        $('select[name="thana"]').empty();
                        $('select[name="district_id"]').append('<option value="">Select District</option>');

                        $.each(data, function(key, value){
                            $('select[name="district_id"]').append('<option value="'+ value?.id +'">' + value?.district_en + '</option>');
                        });
                    },
                    complete: function(){
                        $('#loader').css("visibility", "hidden");
                    }
                });
            } else {
                $('select[name="district_id"]').empty();
                $('select[name="thana_id"]').empty();
            }

        });


        $('select[name="district_id"]').on('change', function(){
            var district_id = $(this).val();
            if(district_id) {
                $.ajax({
                    url: '/districtToThanaWID/'+district_id,
                    type:"GET",
                    dataType:"json",
                    beforeSend: function(){
                        $('#loader').css("visibility", "visible");
                    },

                    success:function(data) {
                        $('select[name="thana_id"]').empty();
                        $('select[name="thana_id"]').append('<option value="">Select Thana</option>');

                        $.each(data, function(key, value){
                            $('select[name="thana_id"]').append('<option value="'+ value?.id +'">' + value?.thana_en + '</option>');
                        });
                    },
                    complete: function(){
                        $('#loader').css("visibility", "hidden");
                    }
                });
            } else {
                $('select[name="thana_id"]').empty();
            }

        });

    });



</script>
@endsection
