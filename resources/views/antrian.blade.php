<x-app-layout>
    <div class="d-flex align-items-center" style="height: 100%">
        <div class="row flex-fill">
            <div class="col">
                <div class="row">
                    <div class="col text-center">
                        <p class="fs-1 fw-semibold">Nomor Antrian Anda</p>
                        <p class="fs-1 fw-bolder">{{ $nomor }}</p>
                        <p class="fs-4 fw-medium">Sisa Antrian: {{ $sisaAntrian }}</p>
                        <p class="fs-5">Nomor Antrian berlaku sesuai tanggal yang diterbitkan</p>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="w-75 p-3">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <div>
                                    <a href="#" onClick="cetak()">
                                        <div class="card mb-3 shadow {{ $jenis == 1 ? 'text-bg-success' : 'text-bg-danger' }}" style="min-width: 18rem;">
                                            <div class="card-body text-center">
                                            <span class="fs-1">CETAK</span>
                                            </div>
                                        </div>
                                    </a>
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
            var id = "{{ $id }}";
            function cetak() {
                window.open("{{ route('antrian.cetak') }}?id=" + id, "_blank");
                window.location.replace("{{ route('index')}}");
            }
        </script>
    </x-slot>
</x-app-layout>
