{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-app-layout>
    <div class="alert alert-primary border-0" role="alert">
        Selamat Datang di Puskesmas 9 Nopember, harap tunggu nomor antrian anda dipanggil.
    </div>
    <div class="" style="height: 100%">
        <div class="row">
            <div class="col">

                <div class="d-flex justify-content-center">
                    <div class="w-100 p-3">
                        <div class="row">
                            <div class="col-6">
                                <div>
                                    <p class="fs-3 fw-semibold text-center">Sisa Antrian</p>
                                    <div class="row">
                                        <div class="col">
                                            <p class="fs-3 fw-semibold">Umum (A): <span id="antrian-sisa-a">___</span></p>
                                        </div>
                                        <div class="col">
                                            <p class="fs-3 fw-semibold text-end">Prioritas (B): <span id="antrian-sisa-b">___</span></p>
                                        </div>
                                    </div>
                                    <div class="card px-3 border border-3 shadow" style="border-color:#435177!important">
                                        <div class="card-body" style="min-height: 300px;">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-4">
                                    <p class="fs-3 fw-semibold text-center">Loket 1</p>
                                    <div class="row">
                                        <div class="col">
                                            <div class="card mb-2 border border-3" style="border-color:#435177!important">
                                                <div class="card-body">
                                                    <p class="fs-1 fw-bold text-center mb-0" id="1-antrian-nomor-a">___</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card mb-2 border border-3" style="border-color:#435177!important">
                                                <div class="card-body">
                                                    <p class="fs-1 fw-bold text-center mb-0" id="1-antrian-nomor-b">___</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <p class="fs-3 fw-semibold text-center">Loket 2</p>
                                    <div class="row">
                                        <div class="col">
                                            <div class="card mb-2 border border-3" style="border-color:#435177!important">
                                                <div class="card-body">
                                                    <p class="fs-1 fw-bold text-center mb-0" id="2-antrian-nomor-a">___</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="card mb-2 border border-3" style="border-color:#435177!important">
                                                <div class="card-body">
                                                    <p class="fs-1 fw-bold text-center mb-0" id="2-antrian-nomor-b">___</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
    </div>

    <x-slot name="script">
        <script type="text/javascript">

            function getAntrian() {

                function update1(loket) {
                    var url = "{{ route('monitoring.getAntrianByLoket') . '?jenis=1' }}&loket=" + loket;
                    $.get(url, function(data, status){
                        document.getElementById(loket + "-antrian-nomor-a").innerText = data.nomor;
                        if (data.status == 1) {
                            $("#"+ loket + "-antrian-nomor-a").addClass("blinking-text");
                        }
                        else {
                            $("#"+ loket + "-antrian-nomor-a").removeClass("blinking-text");
                        }
                        document.getElementById("antrian-sisa-a").innerText = data.sisaAntrian;
                    });

                    setTimeout(function() {
                        update1(loket);
                    }, 1000);
                }

                update1(1);
                update1(2);

                function update2(loket) {
                    var url = "{{ route('monitoring.getAntrianByLoket') . '?jenis=2' }}&loket=" + loket;
                    $.get(url, function(data, status){
                        document.getElementById(loket + "-antrian-nomor-b").innerText = data.nomor;
                        if (data.status == 1) {
                            $("#"+ loket + "-antrian-nomor-b").addClass("blinking-text");
                        }
                        else {
                            $("#"+ loket + "-antrian-nomor-b").removeClass("blinking-text");
                        }
                        document.getElementById("antrian-sisa-b").innerText = data.sisaAntrian;
                    });

                    setTimeout(function() {
                        update2(loket);
                    }, 1000);
                }

                update2(1);
                update2(2);
            }

            getAntrian();

        </script>
    </x-slot>
</x-app-layout>

