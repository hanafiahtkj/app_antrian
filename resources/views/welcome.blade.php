<x-app-layout>
    <div class="d-flex align-items-center" style="height: 100%">
        <div class="row flex-fill">
            <div class="col">
                <div class="row">
                    <div class="col text-center">
                        <p class="fs-1 fw-semibold">Selamat Datang</p>
                        <p class="fs-1 fw-medium">Silahkan Pilih Jenis Antrian:</p>
                    </div>
                </div>

                <div class="d-flex justify-content-center">
                    <div class="w-75 p-3">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <div>
                                    <a href="{{ route('antrian') . '?jenis=1' }}">
                                        <div class="card text-bg-success mb-3 shadow" style="min-width: 18rem;">
                                            <div class="card-body text-center">
                                            <span class="fs-1">UMUM</span>
                                            </div>
                                        </div>
                                    </a>
                                    <span class="fs-4 fw-semibold"><span class="text-danger">*</span> Berlaku juga bagi pengguna kartu BPJS/Askes</span>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <div>
                                    <a href="{{ route('antrian') . '?jenis=2' }}">
                                        <div class="card text-bg-danger mb-3 shadow" style="min-width: 18rem;">
                                            <div class="card-body text-center">
                                            <span class="fs-1">PRIORITAS</span>
                                            </div>
                                        </div>
                                    </a>
                                    <span class="fs-4 fw-semibold"><span class="text-danger">*</span> Tekan tombol di atas jika anda:</span>
                                    <ul class="list-group list-group-flush fs-5">
                                        <li class="list-group-item"><i class="la la-check text-danger me-2"></i>Berusia > 65 Tahun</li>
                                        <li class="list-group-item"><i class="la la-check text-danger me-2"></i>Ibu hamil dengan usia kandungan > 7 bulan</li>
                                        <li class="list-group-item"><i class="la la-check text-danger me-2"></i>Penyandang Disabilitas</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
    </div>
</x-app-layout>
