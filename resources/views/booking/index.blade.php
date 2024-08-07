<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Booking</h3>
                <p class="text-subtitle text-muted">Halaman list booking.</p>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Booking</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Booking Servis</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(session('message'))
                        <div class="alert alert-success">
                            <small>{!! session('message') !!}</small>
                        </div>
                    @endif
                    {{-- {{$booking}} --}}
                    <table class="table table-responsive table-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Layanan</th>
                                <th>Tanggal Booking</th>
                                <th>Desc Servis</th>
                                {{-- <th>Start Time</th>
                                <th>End Time</th> --}}
                                <th>Customer</th>
                                <th>cleaners</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $no = $booking->firstItem();
                            @endphp
                            @foreach ($booking as $key => $item )
                                
                                <tr>
                                    <td>{{$no}}</td>
                                    <td class="text-bold-500">{{$item->nopol}}</td>
                                    <td>{{$item->booking_date}}</td>
                                    <td>{{$item->desc}}</td>
                                    {{-- <td>{{$item->start_time}}</td>
                                    <td>{{$item->end_time}}</td> --}}
                                    <td>{{ $item->vehicle ? $item->vehicle->customer ? $item->vehicle->customer->nama : 'N/A' : 'N/A' }}</td>
                                    <td>
                                        @if ($item->mechanic)
                                        {{ $item->mechanic->nama}}
                                        @endif
                                     
                                    </td>
                                    <td class="text-bold-500">
                                        @if ($item->status === 'pending')
                                            <div class="badge bg-warning">{{$item->status}}</div>
                                        @elseif ($item->status === 'onprocess')
                                            <div class="badge bg-danger">{{$item->status}}</div>
                                        @else
                                            <div class="badge bg-success">{{$item->status}}</div>
                                        @endif
                                        
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <button class="btn btn-primary show-modal me-2 d-flex fw-bold" id="{{$item->id_booking}}" key="{{$key}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-arrow-clockwise me-1" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                                                    <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                                                </svg>
                                                Proses
                                            </button>
                                                <form action="{{route('booking.done')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="id_booking" value="{{$item->id_booking}}">
                                                    @if ($item->status === 'onprocess')
                                                        <button class="btn btn-success d-flex fw-bold" id="{{$item->id_booking}}" key="{{$key}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-check2-square me-1" viewBox="0 0 16 16">
                                                                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                                                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                                              </svg>
                                                            Selesai
                                                        </button>
                                                    @else
                                                        <button class="btn btn-success d-flex fw-bold" disabled>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mt-1 bi bi-check2-square me-1" viewBox="0 0 16 16">
                                                                <path d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z"/>
                                                                <path d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z"/>
                                                              </svg>
                                                            Selesai
                                                        </button>
                                                    @endif
                                                </form>
                                           
                                            
                                        </div>
                                        
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                           
                        </tbody>
                    </table>
                    <div class="my-4 navigation w-100 text-end me-0 ms-auto">
                        <div class="d-flex justify-content-end">
                            <ul class="mb-2 pagination pagination-primary "></ul>
                        </div>
                        
                        <small class="pagination-desc d-block"></small>
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
                <form class="form" method="POST" action="{{route('booking.process')}}">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-booking">Proses Booking</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id_booking" id="id_booking">
                        <input type="hidden" name="phone" id="phone">
                        <div class="mb-3">
                            <label for="nopol" class="form-label">Cleanners</label>
                            <input type="text" name="nopol" class="form-control" id="nopol" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="booking_date" class="form-label">Tanggal Booking</label>
                            <input type="date" name="booking_date" class="form-control" id="booking_date" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="id_mechanic" class="form-label">Mechanic</label>
                            <select onchange="setMechanic()" class="form-select" name="id_mechanic" id="id_mechanic">
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="mb-3 col-6">
                                    <label for="start_time" class="form-label">Perkiraan Mulai Pengerjaan</label>
                                    <input type="text" placeholder="Pilih jam" name="start_time" class="form-control js-time-picker" id="start_time" autocomplete="false" disabled>
                                </div>
                                <div class="col-6">
                                    <label for="end_time" class="form-label">Perkiraan Selesai Pengerjaan</label>
                                    <input type="text" placeholder="Pilih jam" name="end_time" class="form-control js-time-picker" id="end_time" autocomplete="false" disabled>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                
            </div>
            </div>
        </div>
    </section>
    <script>

        let mechanic_options
        let min_start_time = '09:00'
        const setMechanic = () => {

            document.getElementById('start_time').value = ''
            document.getElementById('end_time').value = ''
            min_start_time = mechanic_options.find(val => val.id_mechanic === parseInt(document.getElementById('id_mechanic').value)) && mechanic_options.find(val => val.id_mechanic === parseInt(document.getElementById('id_mechanic').value)).latest_time
            
            console.log('min_start_time', min_start_time)

            if($('#id_mechanic').val() !== '0') {
                $('#start_time').removeAttr('disabled')
                $('#end_time').removeAttr('disabled')
            }else if($('#id_mechanic').val() === '0'){
               
                $('#start_time').prop('disabled', true)
                $('#end_time').prop('disabled', true)
            }

            if(isNaN(parseInt(min_start_time))){
                console.log('NaN')
                min_start_time = '09:00'
            }

            console.log('kepanggil')

            let timepicker_option = {
                timeFormat: 'HH:mm',
                interval: 10,
                minTime: min_start_time,
                maxTime: '17:00',
                defaultTime: min_start_time,
                startTime: min_start_time,
                dynamic: false,
                dropdown: true,
                scrollbar: true,
                zindex: 9999
            }

            console.log(timepicker_option)


            $('#start_time').timepicker(timepicker_option);

      
        }

        document.addEventListener("DOMContentLoaded", function(event) {

            let options

            const mechanic = {!! json_encode($mechanic) !!};
            let booking = {!! json_encode($booking) !!};
            console.log('booking', booking)

            booking.links.forEach(val => {
                $('ul.pagination').append(`
                    <li class="page-item ${val.active && 'active'}"><a class="page-link" href="${val.url}">${val.label}</a></li>
                `)
            })

            $('.pagination-desc').html(`
                Menampilkan ${booking.from} sampai ${booking.to} dari ${booking.total} data
            `)
            
            // Your code to run since DOM is loaded and ready
            const myModal = new bootstrap.Modal(document.getElementById('myModal'), {})
        
            document.querySelectorAll('.show-modal').forEach(el=>{
                
                
                el.addEventListener('click', function(){
                    options = ['<option value="0">-- Pilih cleaners --</option>']
                    
                    const this_booking = booking.data[this.getAttribute('key')]


                    mechanic.forEach((item, i) => {
                        //get mechanic->booking only which only match with processing booking_date
                        item.booking = item.booking.filter(val => val.booking_date === this_booking.booking_date)

                        //convert booking->end_time to epoch
                        item.booking.forEach(val => {
                            val.end_time = new Date(val.end_time).getTime()
                        })

                        // Using the spread syntax to get an array of end_time values
                        const endTimes = item.booking.map(booking => booking.end_time);

                        console.log('endTimes', endTimes)

                        // Finding the maximum end_time using Math.max
                        const maxEndTime = new Date(Math.max(...endTimes));

                        mechanic[i] = {
                            ...item,
                            'latest_time' : `${maxEndTime.getHours()}:${maxEndTime.getMinutes()}`
                        }

                        console.log('mechanic', mechanic)

                    })

                    console.log('mechanic', mechanic)
                    mechanic_options = mechanic

                    mechanic.forEach((item) => {
                        options += `<option value="${item.id_mechanic}" latest-time="${item.latest_time}">${item.nama}</option>`
                    })

                    document.getElementById('id_booking').value = this.id
                    document.getElementById('nopol').value = this_booking.nopol
                    document.getElementById('phone').value = this_booking.vehicle.customer.telp
                    document.getElementById('booking_date').value = this_booking.booking_date
                    document.getElementById('id_mechanic').innerHTML = options

                    myModal.show()                    

                })
                
            })

        });
        
        
    </script>
</x-app-layout>


