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
            <h4 class="mb-sm-0 font-size-18">Registration</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Registration</li>
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
                    Search Registrations
                </h3>
                {{Form::open(['method' => 'get'])}}
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">Name</label>
                            {!! Form::text('name', request('name') ?? '',['class'=>'form-control ', 'autocomplete'=>'off', 'placeholder'=>'Name'])!!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="mobile_no" class="mb-2">Mobile</label>
                            {!! Form::text('mobile_no', request('mobile_no') ?? '',['class'=>'form-control ', 'autocomplete'=>'off', 'placeholder'=>'Mobile'])!!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">Division</label>
                            {!! Form::select('division', ['' => 'Select Division']+ $parentdivisions, request('division'), ['id'=>'division','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">District</label>
                            {!! Form::select('district', ['' => 'Select District']+ $parentdistricts, request('district'), ['id'=>'district','class' => 'form-control ']) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">Thana</label>
                            {!! Form::select('thana', ['' => 'Select Thana']+$parentthanas, request('thana'), ['id'=>'thana','class' => 'form-control']) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">Registration Type</label>
                            {!! Form::select('registration_type', ['' => 'Select Registration Type', 1 => 'Web', 2 => 'Facebook', 3 => 'Whatsapp'], request('registration_type'), ['id'=>'registration_type','class' => 'form-control ']) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="from_date" class="mb-2">From Date</label>
                            {!! Form::text('from_date', request('from_date') ?? '',['class'=>'form-control datepickerDMY', 'autocomplete'=>'off',  'placeholder'=>'DD-MM-YYYY'])!!}
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="to_date" class="mb-2">To Date</label>
                            {!! Form::text('to_date', request('to_date') ?? '',['class'=>'form-control datepickerDMY', 'autocomplete'=>'off',  'placeholder'=>'DD-MM-YYYY'])!!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-4"><i class="fa fa-search mr-2"></i>Filter</button>
                            <a type="button" class="btn btn-danger waves-effect waves-light mt-4" href="{{ route('admin.registrations.index') }}">Clear</a>
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

        <div class="dt-buttons btn-group flex-wrap">
            <a class="btn btn-success buttons-excel buttons-html5" href="{{ route(Route::currentRouteName(), array_merge(request()->all(), ['download'=>true])) }}" ><i class="fa fa-download ml-1"></i> <span>CSV Download</span></a>
        </div>

        <div class="table-responsive my-2">
            <table class="table table-centered mb-0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Mobile</th>
                        <th>Division</th>
                        <th>District</th>
                        <th>Thana</th>
                        <th>Registration Type</th>
                        <th>Is Approved</th>
                        <th>Approved By</th>
                        <th>Dessert</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if($registrations->count()>0)
                        @foreach ($registrations as $i =>  $registration)
                            <tr>
                                <td>{{ $registration->name }}</td>
                                <td>{{ $registration->mobile_no }}</td>
                                <td>{{ $registration->division }}</td>
                                <td>{{ $registration->district }}</td>
                                <td>{{ $registration->thana }}</td>
                                <td>
                                    <span class="badge badge-info">{{App\Utilities\Enum\RegistrationTypeEnum::getKey($registration->registration_type)}}</span>
                                </td>
                                <td>
                                    {{App\Utilities\Enum\RegistrationApprovalEnum::getKey($registration->is_approved)}}
                                </td>
                                <td>{{ $registration->approver ? $registration->approver->name : '' }}</td>
                                <td>
                                    {{ $registration->dessert_type }}
                                    <br>
                                    <a href="{{ asset('storage/'.$registration->dessert_image) }}" data-lightbox="image-1" data-title="My caption" class="magnify">
                                        <img src="{{ asset('storage/'.$registration->dessert_image) }}" alt="" height="30" >
                                    </a>
                                </td>
                                <td>
                                    @if (!($registration->is_approved==1))
                                        @can('registration-edit')
                                            <a href="{{ route('admin.registrations.edit',$registration->id) }}" class="mr-2" title="Edit"  data-caption="11">
                                                <i class="fa fa-pencil-alt text-success font-16"></i>
                                            </a>
                                        @endcan
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>

        </div>

        @include('/includes/paginate', ['paginator' => $registrations])
    </div>
</div>

<script type="text/javascript">


        $(document).ready(function() {
            $('select[name="division"]').on('change', function(){
                var division = $(this).val();
                console.log(division);
                if(division) {
                    $.ajax({
                        url: '/devisionToDistrict/'+division,
                        type:"GET",
                        dataType:"json",
                        beforeSend: function(){
                            $('#loader').css("visibility", "visible");
                        },

                        success:function(data) {
                            console.log(data);

                            $('select[name="district"]').empty();
                            $('select[name="thana"]').empty();

                            $('select[name="district"]').append('<option value="">Select District</option>');
                            $.each(data, function(key, value){
                                $('select[name="district"]').append('<option value="'+ value?.district_en +'">' + value?.district_en + '</option>');
                            });
                        },
                        complete: function(){
                            $('#loader').css("visibility", "hidden");
                        }
                    });
                } else {
                    $('select[name="district"]').empty();
                    $('select[name="thana"]').empty();
                }

            });


            $('select[name="district"]').on('change', function(){
                var district = $(this).val();
                if(district) {
                    $.ajax({
                        url: '/districtToThana/'+district,
                        type:"GET",
                        dataType:"json",
                        beforeSend: function(){
                            $('#loader').css("visibility", "visible");
                        },

                        success:function(data) {
                            $('select[name="thana"]').empty();

                            $('select[name="thana"]').append('<option value="">Select Thana</option>');
                            $.each(data, function(key, value){
                                $('select[name="thana"]').append('<option value="'+ value?.thana_en +'">' + value?.thana_en + '</option>');
                            });
                        },
                        complete: function(){
                            $('#loader').css("visibility", "hidden");
                        }
                    });
                } else {
                    $('select[name="thana"]').empty();
                }

            });

        });



</script>

@endsection
