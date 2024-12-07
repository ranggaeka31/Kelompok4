@extends('layout.admin')

@push('script')
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@2.1.8"></script>

    <script>
        var options = {
            chart: {
                height: 455,
                type: "bar",
                stacked: true
            },
            dataLabels: {
                enabled: false
            },
            colors: ['#6259ca', '#53caed', '#FF0000'],
            series: [

                {
                    name: 'Uang Ditabung',
                    type: 'column',
                    data: {!! json_encode($uangditabung) !!}
                },
                {
                    name: "Uang Ditarik",
                    type: 'column',
                    data: {!! json_encode($uangditarik) !!}
                },
            ],
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            plotOptions: {
                bar: {
                    columnWidth: "55%"
                }
            },

            xaxis: {
                categories: {!! json_encode($previousMonths) !!}
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function(val) {
                        return "Rp." + new Intl.NumberFormat().format(val)
                    }
                }
            },
            legend: {
                horizontalAlign: "left",
                offsetX: 10
            }
        };


        var chart = new ApexCharts(document.querySelector("#chartLine"), options);

        chart.render();
    </script>
@endpush

@section('content')
@section('title')
    <title>Tabungan</title>
@endsection
<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
            <div class="row">

                <!-- Sales Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">

                        <div class="card-body">
                            <h5 class="card-title"><b>Jumlah Penabung</b></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bx bx-user"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $penabung }}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">

                        <div class="card-body">
                            <h5 class="card-title"><b>Jumlah Semua Tabungan</b></h5>

                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>Rp.{{ number_format($uangmasuk, 0, '.', '.') }}</h6>

                                </div>
                            </div>
                        </div>

                    </div>
                </div><!-- End Revenue Card -->

                <!-- Reports -->
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h5 class="card-title"><b>Grafik</b></h5>

                            <!-- Line Chart -->
                            <div id="chartLine"></div>


                            <!-- End Line Chart -->

                        </div>

                    </div>
                </div><!-- End Reports -->

            </div>
        </div><!-- End Left side columns -->

    </div>

</section>
@endsection
