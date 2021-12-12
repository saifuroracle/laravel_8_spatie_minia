@extends('layouts.app')
@extends('layouts.topbar')
@extends('layouts.leftsidebar')
@extends('layouts.rightsidebar')
@extends('layouts.footer')

@section('content')

    {{-- <link rel="stylesheet" href="{{ asset('marks_assets/css/apexcharts.css') }}"> --}}
    <script src="{{ asset('marks_assets/js/apexcharts.min.js') }}"></script>


        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Dashboard</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            {{-- <div class="col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Registration</span>
                            <h4 class="mb-3">
                                {{ $total_registrations }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div> --}}









@endsection
