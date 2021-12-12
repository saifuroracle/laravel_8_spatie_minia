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
            <h4 class="mb-sm-0 font-size-18">Event Schedule Edit</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.event.schedules.index') }}">Event Schedule</a></li>
                    <li class="breadcrumb-item active">Event Schedule Edit</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


    <div class="container-fluid">

        <div class="row">
            <div class="col-8 mx-auto">
                <div class="card">
                    <div class="card-body order-list">
                        <h3 class="header-title mt-0 mb-5 text-center">
                            Edit Event Schedule
                        </h3>
                        {{ Form::model($editModeData,['route' =>['admin.event.schedules.update',$editModeData->id ],'method' => 'PUT','files'=>'true','id'=>'noticeboard-form'])}}

                        <div class="row">


                            <div class="col-md-12">
                                <div class="form-group row required">
                                    <label class="col-sm-4 col-form-label control-label">Schedule Date</label>
                                    <div class="col-sm-8">
                                        {!! Form::text('schedule_date', $editModeData->schedule_date, ['id' =>'schedule_date','class' => 'form-control datepicker', 'placeholder' => 'Schedule Date', 'required' => 'required', 'autocomplete'=>'off']) !!}
                                        @if($errors->has('schedule_date'))
                                            <strong style="color:red;">{{ $errors->first('schedule_date') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 mb-2">Division</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('division_id', ['' => 'Select Division']+ $parentdivisions, $editModeData->division_id, ['id'=>'division_id','class' => 'form-control', 'required'=>'true']) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label for="name" class="col-sm-4 mb-2">District</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('district_id', $parentdistricts, $editModeData->district_id, ['id'=>'district_id','class' => 'form-control', 'required'=>'true']) !!}
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-12">
                                <div class="form-group row required">
                                    <label for="role" class="col-sm-4 col-form-label control-label">Thanas</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('thanas[]',  $parentthanas, $editModeData->thanas, ['id' =>'thanas','class' => 'form-control select2', 'required' => 'required', 'multiple']) !!}
                                        @if($errors->has('thanas'))
                                            <strong style="color:red;">{{ $errors->first('thanas') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group row required">
                                    <label class="col-sm-4 col-form-label control-label">Status</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('status', [  1 => 'Active', 0 => 'Inactive' ], $editModeData->status, ['class' => 'form-control', 'required' => 'required']) !!}
                                        @if($errors->has('status'))
                                            <strong style="color:red;">{{ $errors->first('status') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-md-12 text-right">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="ti-check-box mr-2"></i>Update</button>
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
    </div>




@endsection

@push('custom_scripts')
<script>

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
                        $('select[name="thanas[]"]').empty();

                        $('select[name="district_id"]').append('<option value="" style="display: none">জেলা নির্বাচন করুন *</option>');
                        $('select[name="thanas[]"]').append('<option value="" style="display: none">থানা নির্বাচন করুন *</option>');

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
                $('select[name="thanas[]"]').empty();
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
                        $('select[name="thanas[]"]').empty();

                        $('select[name="thanas[]"]').append('<option value="" style="display: none">থানা নির্বাচন করুন *</option>');
                        $.each(data, function(key, value){
                            $('select[name="thanas[]"]').append('<option value="'+ value?.thana_en +'">' + value?.thana_en + '</option>');
                        });
                    },
                    complete: function(){
                        $('#loader').css("visibility", "hidden");
                    }
                });
            } else {
                $('select[name="thanas[]"]').empty();
            }

        });

    });
</script>
@endpush
