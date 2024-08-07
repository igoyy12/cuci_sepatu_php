<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'])
    {{-- <link href="{{ asset('css/styles.css') }}" rel="stylesheet"> --}}
    <title>SepatuKu</title>
    <style>
        .bg-hero {
            background: url('assets/img/backround.jpg');
            background-position: bottom;
        }

        .bg-hero::after {
            content: '';
            width: 100%;
            height: 100vh;
            background-image: linear-gradient(rgba(0, 0, 0, 0.35), rgba(0, 0, 0, 0.75));
            position: absolute;
        }

        .hero-text-container {
            padding: 0 15%;
        }

        .hero-text-container h1 {
            padding: 0 15%;
        }

        .font-quicksand {
            font-family: 'Quicksand', sans-serif;
        }

        .px-custom {
            padding: 0 15%;
        }

        .py-custom {
            padding: 100px 0;
        }

        .w-45 {
            width: 45%;
            height: auto;
        }

        .w-60 {
            width: 60%;
            height: auto;
        }

        .w-70 {
            width: 70%;
            height: auto;
        }

        .w-80 {
            width: 80%;
            height: auto;
        }

        .w-90 {
            width: 90%;
            height: auto;
        }

        .w-95 {
            width: 95%;
            height: auto;
        }

        .bg-blue-light {
            background: #CFF4FC;
        }

        .text-blue-light {
            color: #CFF4FC;
        }

        .soft-black {
            color: #3b444b;
        }

        .soft-black-1 {
            color: #414a4c
        }

        .step-1 {
            display: none;
        }

        .step-2 {
            display: none;
        }

        .active-step {
            display: block !important;
        }

        .bg-custom {
            background: #435ebe;
        }

        .bg-custom:hover {
            background: rgba(67, 94, 190, .8);
        }

        .bg-custom-50 {
            background: rgba(67, 94, 190, .5);
        }

        .color-custom {
            color: #435ebe;
        }

        @media (max-width: 1399.98px) {}

        @media (max-width: 1199.98px) {}

        @media (max-width: 991.98px) {}

        @media (max-width: 767.98px) {
            .fs-custom {
                font-size: 36px;
            }
        }

        @media (max-width: 575.98px) {
            .fs-custom {
                font-size: 24px;
            }

            .hero-text-container {
                padding: 0 5%;
            }

            .hero-text-container h1 {
                padding: 0 5%;
            }

            .form-booking {
                padding-top: 10%;
            }

            .booking-btn {
                margin-top: 7%;
            }

            .hero-text-container p {
                margin-top: 5%;
            }
        }
    </style>
</head>

<body>
    {{-- Navbar Start --}}
    <nav class="navbar navbar-expand-lg navbar-light" style="position: fixed; top: 0; width: 100%; z-index: 1000; overflow: hidden;">
        <div class="container-fluid">
            {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button> --}}
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="px-5 navbar-brand text-light fw-bold font-quicksand" href="{{ route('home') }}">SepatuKu</a>
                <div class="ms-auto">
                    <a href="{{ route('login') }}" class="btn bg-custom text-light fw-bold booking-btn me-3">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <section class="services bg-custom-50 py-custom">
        <div class="container">
            <div class="row soft-black">
                <div class="mb-3 text-center Title text-light">
                    <h2 class="col-12 font-quicksand ">Mengapa Memilih Kami?</h2>
                    <p>Sepatuku merupakan usaha yang bergerak dibidang jasa laundry cuci sepatu dan perbaikan sepatu
                        yang berasal dari kota Depok. <br> Berbagai pelayanan seperti pencucian dan perbaikan sepatu
                        kami tawarkan untuk mengembalikan sepatu seperti baru.</p>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="col-md-4">
                        <div class="shadow card">
                            <div class="items-center-center card-body">
                                <div class="p-4 my-4">
                                    <img src="{{ asset('assets/img/qris.png') }}" class="items-center w-100" alt="">
                                </div>
                                <a href="https://wa.me/6289508306786" class="btn btn-success w-100">Hubungi Kami di WhatsApp</a>
                                <a href="{{ route('home') }}" class="items-center mt-3 text-gray-900 d-block">
                                    kembali ke home
                                </a>
                            </div>
                        </div>
      
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Section  Start --}}
    <footer class="py-4 bg-dark d-flex justify-content-center align-items-center">
        <small class="text-light font-quicksand fw-bold">&copy; Sepatuku 2024</small>
    </footer>
    {{-- Section END --}}

    {{-- <script src="{{asset('js/bootstrap.min.js')}}"></script> --}}
    @vite(['resources/js/bootstrap.js', 'resources/js/sweetalert2.js'])
    <script src="{{asset('/vendors/jquery/jquery.min.js')}}"></script>
</body>
</html>