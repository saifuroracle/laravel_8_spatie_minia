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
            <div class="col-sm-6 col-md-3">
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
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Web Registration</span>
                            <h4 class="mb-3">
                                {{ $total_web_registrations }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total FB Registration</span>
                            <h4 class="mb-3">
                                {{ $total_fb_registrations }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Whatsapp Registration</span>
                            <h4 class="mb-3">
                                {{ $total_whatsapp_registrations }}
                            </h4>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div id="last_15_days_reg_col_chart"></div>
                        </div>
                    </div>
                </div>
            </div>



<script>
    var options = {
            series: [
                {
                    name: 'Total Registrations',
                    data: {!! $last_15_days_reg_col_chart_data->pluck('data') !!}
                },
                {
                    name: 'Web',
                    data: {!! $last_15_days_reg_col_chart_data->pluck('data_web') !!}
                },
                {
                    name: 'FB',
                    data: {!! $last_15_days_reg_col_chart_data->pluck('data_fb') !!}
                },
                {
                    name: 'Whatsapp',
                    data: {!! $last_15_days_reg_col_chart_data->pluck('data_whatsapp') !!}
                }
            ],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                    // borderRadius: 10,
                },
            },

            dataLabels: {
                enabled: false,
                style: {
                    colors: ["#304758"]
                }
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: {!! $last_15_days_reg_col_chart_data->pluck('date') !!},
            },
            yaxis: {
                title: {
                    text: 'Total Registrations',
                },
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                    return  val
                    }
                }
            },
            title: {
                text: 'Last 15 days registration',
                floating: true,
                align: 'center',
                style: {
                    color: '#444'
                }
            }
        };

        var chart = new ApexCharts(document.querySelector("#last_15_days_reg_col_chart"), options);
        chart.render();
</script>

@endsection
