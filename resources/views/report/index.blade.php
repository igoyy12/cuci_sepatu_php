<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>Halaman Laporan</h3>
                <p class="text-subtitle text-muted">Halaman laporan servis.</p>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    
    <section class="section">
        <a class="mb-3 btn btn-primary" href="{{route('print')}}">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 bi bi-printer-fill me-1" viewBox="0 0 16 16">
                <path d="M5 1a2 2 0 0 0-2 2v1h10V3a2 2 0 0 0-2-2H5zm6 8H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"/>
                <path d="M0 7a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2h-1v-2a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v2H2a2 2 0 0 1-2-2V7zm2.5 1a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
              </svg>
            Print
        </a>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Laporan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table- responsive table-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nopol</th>
                                <th>Tanggal Booking</th>
                                <th>Desc Servis</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Customer</th>
                                <th>cleaners</th>
                                <th>Status</th>
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
                                    <td>{{$item->start_time}}</td>
                                    <td>{{$item->end_time}}</td>
                                    <td>{{ $item->vehicle ? ($item->vehicle->customer ? $item->vehicle->customer->nama : 'N/A') : 'N/A' }}</td>
                                    <td>{{ $item->mechanic ? $item->mechanic->nama : 'N/A' }}</td>
                                    <td class="text-bold-500">
                                        @if ($item->status === 'pending')
                                            <div class="badge bg-warning">{{$item->status}}</div>
                                        @elseif ($item->status === 'onprocess')
                                            <div class="badge bg-danger">{{$item->status}}</div>
                                        @else
                                            <div class="badge bg-success">{{$item->status}}</div>
                                        @endif
                                        
                                    </td>
                                    
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                            
                        </tbody>
                    </table>
                </div>
                
                <div class="my-4 navigation w-100 text-end me-0 ms-auto">
                    <div class="d-flex justify-content-end">
                        <ul class="mb-2 pagination pagination-primary "></ul>
                    </div>
                    
                    <small class="pagination-desc d-block"></small>
                </div>

            
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modal-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-booking">Tambah User</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('register.user')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" id="email">
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>
                        <input type="hidden" class="form-control form-control-xl" name="password" id="password" placeholder="Password">
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            booking = {!! json_encode($booking) !!}
            console.log(booking)

            booking.links.forEach(val => {
                $('ul.pagination').append(`
                    <li class="page-item ${val.active && 'active'}"><a class="page-link" href="${val.url}">${val.label}</a></li>
                `)
            })

            $('.pagination-desc').html(`
                Menampilkan ${booking.from} sampai ${booking.to} dari ${booking.total} data
            `)

        })

        
    </script>
</x-app-layout>
