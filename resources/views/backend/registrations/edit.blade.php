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
            <h4 class="mb-sm-0 font-size-18">Registration Edit</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.registrations.index') }}">Registration</a></li>
                    <li class="breadcrumb-item active">Registration Edit</li>
                </ol>
            </div>

        </div>
    </div>
</div>
<!-- end page title -->


    <div class="container-fluid">

        <div class="row">
            <div class="col-12 mx-auto">
                <div class="card">
                    <div class="card-body order-list">
                        <h3 class="header-title mt-0 mb-3">
                            Edit Registration
                        </h3>
                        {{ Form::model($editModeData,['route' =>['admin.registrations.update',$editModeData->id ],'method' => 'PUT','files'=>'true','id'=>'registrations-form'])}}

                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label for="role" class="col-sm-4 col-form-label control-label">Name</label>
                                    <div class="col-sm-8">
                                        {!! Form::text( 'name', $editModeData->name, $attributes = ['class'=>'form-control','id'=>'name','placeholder'=>'Name *', 'readonly' => 'true' ]) !!}
                                        @if($errors->has('name'))
                                            <strong style="color:red;">{{ $errors->first('name') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>



                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label for="role" class="col-sm-4 col-form-label control-label">Mobile</label>
                                    <div class="col-sm-8">
                                        {!! Form::tel( 'mobile_no', $editModeData->mobile_no, $attributes = ['class'=>'form-control numberOnlyInput','id'=>'mobile_no','placeholder'=>'Mobile number *', 'min' => 0, 'autocomplete'=>'off','pattern'=> '(^(\+88|0088|88)?(01){1}[3456789]{1}(\d){8})$', 'oninvalid' => 'this.setCustomValidity("Enter valid mobile no")', 'oninput' => 'this.setCustomValidity("")', 'readonly' => 'true']) !!}
                                        @if($errors->has('mobile_no'))
                                            <strong style="color:red;">{{ $errors->first('mobile_no') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label for="role" class="col-sm-4 col-form-label control-label">Alternate Mobile</label>
                                    <div class="col-sm-8">
                                        {!! Form::tel( 'alternative_mobile_no', $editModeData->alternative_mobile_no, $attributes = ['class'=>'form-control numberOnlyInput','id'=>'alternative_mobile_no','placeholder'=>'Alternate mobile', 'min' => 0, 'autocomplete'=>'off','pattern'=> '(^(\+88|0088|88)?(01){1}[3456789]{1}(\d){8})$', 'oninvalid' => 'this.setCustomValidity("Enter valid mobile no")', 'oninput' => 'this.setCustomValidity("")', 'readonly' => 'true']) !!}
                                        @if($errors->has('alternative_mobile_no'))
                                            <strong style="color:red;">{{ $errors->first('alternative_mobile_no') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>


                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label for="role" class="col-sm-4 col-form-label control-label">Division</label>
                                    <div class="col-sm-8">
                                        <span class="badge bg-soft-success text-success">{{ $editModeData->division }}</span>
                                        {!! Form::select('division', ['' => 'Select Division']+ $parentdivisions, $editModeData->division, ['id' =>'division','class' => 'form-control', 'required' => 'required', 'placeholder'=>'Division *']) !!}
                                        @if($errors->has('division'))
                                            <strong style="color:red;">{{ $errors->first('division') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label for="role" class="col-sm-4 col-form-label control-label">District</label>
                                    <div class="col-sm-8">
                                        <span class="badge bg-soft-success text-success">{{ $editModeData->district }}</span>
                                        {!! Form::select('district', ['' => 'Select District']+ $parentdistricts, $editModeData->district, ['id' =>'district','class' => 'form-control', 'required' => 'required', 'placeholder'=>'District *']) !!}
                                        @if($errors->has('district'))
                                            <strong style="color:red;">{{ $errors->first('district') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label for="role" class="col-sm-4 col-form-label control-label">Thana</label>
                                    <div class="col-sm-8">
                                        <span class="badge bg-soft-success text-success">{{ $editModeData->thana }}</span>
                                        {!! Form::select('thana', ['' => 'Select Thana']+ $parentthanas,  $editModeData->thana, ['id' =>'thana','class' => 'form-control', 'required' => 'required', 'placeholder'=>'Thana *']) !!}
                                        @if($errors->has('thana'))
                                            <strong style="color:red;">{{ $errors->first('thana') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            {{-- <div class="col-md-6">
                                <div class="form-group row required">
                                    <label for="role" class="col-sm-4 col-form-label control-label">Registration type</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('registration_type', ['' => 'Select Registration Type', 1 => 'Web', 2 => 'Facebook', 3 => 'Whatsapp'], $editModeData->registration_type, ['id'=>'registration_type','class' => 'form-control', 'required' => 'required']) !!}
                                        @if($errors->has('registration_type'))
                                            <strong style="color:red;">{{ $errors->first('registration_type') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div> --}}

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label for="role" class="col-sm-4 col-form-label control-label">Dessert type</label>
                                    <div class="col-sm-8">
                                        {!! Form::text( 'dessert_type', $editModeData->dessert_type, $attributes = ['class'=>'form-control','id'=>'dessert_type','placeholder'=>'Dessert type', 'readonly' => 'true']) !!}
                                        @if($errors->has('dessert_type'))
                                            <strong style="color:red;">{{ $errors->first('dessert_type') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group row required">
                                    <label for="role" class="col-sm-4 col-form-label control-label">Approval</label>
                                    <div class="col-sm-8">
                                        {!! Form::select('is_approved', ['' => 'Select Approval Type', 0 => 'Pending', 1 => 'Approved', 2 => 'Rejected'], $editModeData->is_approved, ['id'=>'is_approved','class' => 'form-control' ]) !!}
                                        @if($errors->has('is_approved'))
                                            <strong style="color:red;">{{ $errors->first('is_approved') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div>




                            {{-- <div class="col-md-6">
                                <div class="form-group row ">
                                    <label for="role" class="col-sm-4 col-form-label control-label">Dessert Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" id="dessert_img" class="form-control mb-3" name="dessert_img" accept="image/*" readonly disabled/>

                                        @if($errors->has('dessert_img'))
                                            <strong style="color:red;">{{ $errors->first('dessert_img') }}</strong>
                                        @endif
                                    </div>
                                </div>
                            </div> --}}



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


