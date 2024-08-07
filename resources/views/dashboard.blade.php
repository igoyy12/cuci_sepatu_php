<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
                <p class="text-subtitle text-muted">This is the main page.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    <section>
        <div class="row gx-3">
            <div class="col-4">
                <div class="card bg-warning p-4">
                    <div class="row align-items-center text-light">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-alarm w-100 h-100 opacity-50" viewBox="0 0 16 16">
                                <path d="M8.5 5.5a.5.5 0 0 0-1 0v3.362l-1.429 2.38a.5.5 0 1 0 .858.515l1.5-2.5A.5.5 0 0 0 8.5 9V5.5z"/>
                                <path d="M6.5 0a.5.5 0 0 0 0 1H7v1.07a7.001 7.001 0 0 0-3.273 12.474l-.602.602a.5.5 0 0 0 .707.708l.746-.746A6.97 6.97 0 0 0 8 16a6.97 6.97 0 0 0 3.422-.892l.746.746a.5.5 0 0 0 .707-.708l-.601-.602A7.001 7.001 0 0 0 9 2.07V1h.5a.5.5 0 0 0 0-1h-3zm1.038 3.018a6.093 6.093 0 0 1 .924 0 6 6 0 1 1-.924 0zM0 3.5c0 .753.333 1.429.86 1.887A8.035 8.035 0 0 1 4.387 1.86 2.5 2.5 0 0 0 0 3.5zM13.5 1c-.753 0-1.429.333-1.887.86a8.035 8.035 0 0 1 3.527 3.527A2.5 2.5 0 0 0 13.5 1z"/>
                            </svg>
    
                        </div> 
                        <div class="col-8 text-end">
                            <div class="pending" style="font-size: 64px;font-weight:800;line-height:.75;">8</div>
                            <div class="fw-bold">
                                <small style="line-height: 0">Pending</small>
                            </div>
                        </div> 
                    </div>
                   
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-danger p-4">
                    <div class="row align-items-center text-light">
                        <div class="col-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-hourglass-split w-100 h-100 opacity-50" viewBox="0 0 16 16">
                                <path d="M2.5 15a.5.5 0 1 1 0-1h1v-1a4.5 4.5 0 0 1 2.557-4.06c.29-.139.443-.377.443-.59v-.7c0-.213-.154-.451-.443-.59A4.5 4.5 0 0 1 3.5 3V2h-1a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-1v1a4.5 4.5 0 0 1-2.557 4.06c-.29.139-.443.377-.443.59v.7c0 .213.154.451.443.59A4.5 4.5 0 0 1 12.5 13v1h1a.5.5 0 0 1 0 1h-11zm2-13v1c0 .537.12 1.045.337 1.5h6.326c.216-.455.337-.963.337-1.5V2h-7zm3 6.35c0 .701-.478 1.236-1.011 1.492A3.5 3.5 0 0 0 4.5 13s.866-1.299 3-1.48V8.35zm1 0v3.17c2.134.181 3 1.48 3 1.48a3.5 3.5 0 0 0-1.989-3.158C8.978 9.586 8.5 9.052 8.5 8.351z"/>
                            </svg>
                        </div> 
                        <div class="col-8 text-end">
                            <div class="onprocess" style="font-size: 64px;font-weight:800;line-height:.75;">8</div>
                            <div class="fw-bold">
                                <small style="line-height: 0">On Process</small>
                            </div>
                        </div> 
                    </div>
                   
                </div>
            </div>
            <div class="col-4">
                <div class="card bg-success p-4">
                    <div class="row align-items-center text-light">
                        <div class="col-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check w-100 h-100 opacity-50" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                    </svg>
                        </div> 
                        <div class="col-8 text-end">
                            <div class="done" style="font-size: 64px;font-weight:800;line-height:.75;">8</div>
                            <div class="fw-bold">
                                <small style="line-height: 0">Done</small>
                            </div>
                        </div> 
                    </div>
                   
                </div>
            </div>  
        </div>
    </section>
    
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Statistik Bulanan (2024)</h4>
            </div>
            <div class="card-body">

                <div id="chart"></div>
                {{-- <div id="error">
                    Data not found.
                </div> --}}
            </div>
        </div>
    </section>
    <script>
        const booking = {!! json_encode($booking) !!};

        const pending = booking.filter(item => item.status === 'pending').length;
        const onprocess = booking.filter(item => item.status === 'onprocess').length;
        const done = booking.filter(item => item.status === 'done').length;
        const data_done = booking.filter(item => item.status === 'done' && new Date(item.booking_date).getFullYear() === new Date().getFullYear());

        const monthNames = ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Agu", "Sep", "Okt", "Nov", "Des"];

        let dataChart = {
            'Jan': 0,
            'Feb': 0,
            'Mar': 0,
            'Apr': 0,
            'Mei': 0,
            'Jun': 0,
            'Jul': 0,
            'Agu': 0,
            'Sep': 0,
            'Okt': 0,
            'Nov': 0,
            'Des': 0
        }

        data_done.forEach(val => {
            // console.log(data_done.filter(val => monthNames[new Date(val.booking_date).getMonth()] === dataChart[]))
            let month = monthNames[new Date(val.booking_date).getMonth()]
            dataChart = {
                ...dataChart,
                [month] : dataChart[month]+1
            }
        });

        const isNotEmpty = Object.entries(dataChart).find(([key, value]) => value > 0);

        console.log({dataChart})

        const chart = document.querySelector("#chart")
        const isError = document.querySelector("#error")

        const serviceCount = Object.keys(dataChart)
        const month = isNotEmpty ? Object.values(dataChart) : []

        const maxEntry = Object.entries(dataChart).reduce((acc, [key, value]) => {
            return value > acc[1] ? [key, value] : acc;
        }, ['', -Infinity]);

        const maxValue = maxEntry[1];


        console.log({month})

        const options = {
            chart: {
                type: 'bar'
            },
            fill: {
                colors: ['#435ebe']
            },
            series: [{
                name: 'sales',
                data: month
            }],
            xaxis: {
                categories: isNotEmpty ? serviceCount : monthNames
            },
            yaxis: {
                showForNullSeries: false,
                tickAmount: maxValue < 5 ? maxValue+2 : maxValue,
                max: maxValue < 5 ? maxValue+2 : maxValue
            },
            noData: {
                text: "No data available",
                align: 'center',
                verticalAlign: 'middle',
                offsetX: 0,
                offsetY: 0,
                style: {
                    fontSize: '14px',
                }
            }
        }

        document.addEventListener("DOMContentLoaded", function(event) {
            $('.pending').html(pending);
            $('.onprocess').html(onprocess);
            $('.done').html(done);

            var chart = new ApexCharts(document.querySelector("#chart"), options);

            chart.render();
        })

    </script>
</x-app-layout>
