<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link href="{{ asset('vendor/metrica/dist/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('vendor/metrica/dist/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendor/metrica/dist/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('vendor/metrica/dist/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />

        <!-- Scripts -->

        <style>
            body[data-layout=horizontal].dark-topbar .navbar-custom, body[data-layout=horizontal].dark-topbar .topbar {
                background-color: #41cbd8;
            }
            body[data-layout=horizontal].dark-topbar .navbar-custom .brand, body[data-layout=horizontal].dark-topbar .topbar .brand {
                background-color: #41cbd8;
            }
            body[data-layout=horizontal] .topbar .brand {
                width: 350px!important;
                text-align: left;
                margin-left: 5px;
            }
        </style>
    </head>


    <body style="width: 270px; border: 1px solid #8888;">
        <div>
            <img src="{{ asset('img/puskesmas.png') }}" style="height: 60px; float:left;">
            <div class="text-center">
                <p class="fs-5 fw-semibold my-0">Puskesmas 9 Nopember</p>
                <p class="fs-6 fw-semibold my-0">Jl. Keramat Raya No. 3</p>
                <p class="fs-6 fw-semibold my-0">(0511-1837-819)</p>
            </div>
        </div>
        <hr class="mb-1">
        <div>
            <p class="fs-6 fw-semibold mb-0 text-center">{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $antrian->created_at)->isoFormat('dddd, LL HH:mm') . ' '   }}</p>
        </div>
        <hr class="mt-1">
        <div class="text-center">
            <p class="fs-2 fw-semibold mb-2">Nomor Antrian</p>
            <p class="fs-1 fw-bolder mb-2">{{ $antrian->nomor }}</p>
            <p class="fs-4 fw-medium mb-2">Sisa Antrian: {{ $sisaAntrian }}</p>
            <p class="fs-5">Harap Tunggu Nomor Antrian Anda dipanggil oleh Petugas</p>
        </div>


        <script type="text/javascript">
            window.print();
        </script>

    </body>
</html>
