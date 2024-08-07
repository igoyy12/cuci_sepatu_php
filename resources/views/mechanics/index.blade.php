<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="order-last col-12 col-md-6 order-md-1">
                <h3>cleaners</h3>
                <p class="text-subtitle text-muted">Halaman list cleaners.</p>
            </div>
            <div class="order-first col-12 col-md-6 order-md-2">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">cleaners</li>
                    </ol>
                </nav>
            </div>
        </div>
    </x-slot>

    
    <section class="section">
        <button class="mb-3 btn btn-primary show-modal">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 bi bi-person-fill-add me-1" viewBox="0 0 16 16">
                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
            </svg>
            Tambah cleaners
        </button>

        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Users</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    @if(session('message'))
                        <div class="alert alert-success">
                            <small>{!! session('message') !!}</small>
                        </div>
                    @endif
                    {{-- {{$booking}} --}}
                    <table class="table table- responsive table-lg">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Alamat</th>
                                <th>Telpon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mechanics as $key => $item )
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$item->nama}}</td>
                                    <td>{{$item->alamat}}</td>
                                    <td>{{$item->telp}}</td>
                                    {{-- <td></td>
                                    <td class="text-bold-500">
                                        <div class="badge bg-warning">{{$item->status}}</div>
                                    </td> --}}
                                    <td>
                                        <div class="d-flex">
                                            <button type="button" class="btn btn-info me-2 show-modal" data-id="{{$item->id_mechanic}}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square me-1" viewBox="0 0 16 16">
                                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                                </svg>
                                                Edit
                                            </button>
                                            <form action="{{route('delete.mechanics')}}" method="post" id="{{$item->id_mechanic}}">
                                                @csrf
                                                @method('DELETE') 
                                                <input type="hidden" name="id" value="{{$item->id_mechanic}}">
                                                <input type="hidden" name="name" value="{{$item->nama}}">
                                                <button type="button" onclick="confirmDelete({{$item->id_mechanic}})" class="btn btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="mb-1 bi bi-trash3-fill me-1" viewBox="0 0 16 16">
                                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
                                                      </svg>
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="modal-mechanic" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-booking">Tambah cleaners</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('add.mechanic')}}" method="POST" id="form_mechanic">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="id_mechanic" class="form-control" id="id_mechanic">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" class="form-control" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">Telpon</label>
                            <input type="number" name="telp" class="form-control" id="telp">
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-primary">Simpan</button>
                    </div>
                </form>
                
                
            </div>
        </div>
    </div>
    <script>
        const confirmDelete = (id) => {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`${id}`).submit()
                    // Swal.fire({
                    // title: "Deleted!",
                    // text: "Your file has been deleted.",
                    // icon: "success"
                    // });
                }
            });
        }


        document.addEventListener("DOMContentLoaded", function(event) {
            const mechanics = {!! json_encode($mechanics) !!};


            const modalUser = new bootstrap.Modal(document.getElementById('modal-mechanic'), {})
            
            document.querySelectorAll('.show-modal').forEach(el=>{
                el.addEventListener('click', function(){
                    $('#form_mechanic')[0].reset()

                    const mechanic = mechanics.find(item => item.id_mechanic === $(this).data("id"))
                    console.log(mechanic)

                    if(mechanic){
                        $('#id_mechanic').val(mechanic.id_mechanic);
                        $('#name').val(mechanic.nama);
                        $('#telp').val(mechanic.telp);
                        $('#alamat').val(mechanic.alamat);
                    }

                    modalUser.show();
                })
            })
        })

        
    </script>
</x-app-layout>
