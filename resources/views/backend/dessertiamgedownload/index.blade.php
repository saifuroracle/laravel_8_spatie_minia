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
            <h4 class="mb-sm-0 font-size-18">Dessert Image Download</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Dessert Image Download</li>
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
                    Dessert Image Download
                </h3>
                {{Form::open(['method' => 'get'])}}
                <div class="row">


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">Division</label>
                            {!! Form::select('division', ['' => 'Select Division']+ $parentdivisions, request('division'), ['id'=>'division','class' => 'form-control', 'required'=>'true']) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">District</label>
                            {!! Form::select('district', ['' => 'Select District']+ $parentdistricts, request('district'), ['id'=>'district','class' => 'form-control', 'required'=>'true']) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="name" class="mb-2">Thana</label>
                            {!! Form::select('thana', ['' => 'Select Thana']+$parentthanas, request('thana'), ['id'=>'thana','class' => 'form-control', 'required'=>'true']) !!}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success waves-effect waves-light mt-4"><i class="fa fa-search mr-2"></i>Download</button>
                            <a type="button" class="btn btn-danger waves-effect waves-light mt-4" href="{{ route('admin.dessert.image.download.index') }}">Clear Filter</a>
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
                        $('select[name="thana"]').append('<option value="">Select Thana</option>');

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
