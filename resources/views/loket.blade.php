<x-app-layout>
    <div class="d-flex align-items-center" style="height: 100%">
        <div class="row flex-fill">
            <div class="col">

                <div class="d-flex justify-content-center">
                    <div class="w-75 p-3">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <div>
                                    <p class="fs-3 fw-semibold text-center">UMUM</p>
                                    <div class="card mb-2 border border-3" style="min-width: 18rem;">
                                        <div class="card-body">
                                            <p class="fs-1 fw-bold text-center mb-0" id="antrian-nomor1">___</p>
                                            <p class="my-0 text-center">Status: <span id="antrian-status1">___</span></p>
                                        </div>
                                    </div>
                                    <p class="mt-0 text-center">Sisa Antrian: <span id="antrian-sisa1">___</span></p>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-success disabled me-2" style="width: 130px;" id="btn-panggil-1" onClick="panggil(1)">Panggil / Ulangi</button>
                                        <button type="button" class="btn btn-success disabled" style="width: 130px;" id="btn-next-1" onClick="next(1)">Next</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <div>
                                    <p class="fs-3 fw-semibold text-center">PRIORITAS</p>
                                    <div class="card mb-2 border border-3" style="min-width: 18rem;">
                                        <div class="card-body">
                                            <p class="fs-1 fw-bold text-center mb-0" id="antrian-nomor2">___</p>
                                            <p class="my-0 text-center">Status: <span id="antrian-status2">___</span></p>
                                        </div>
                                    </div>
                                    <p class="mt-0 text-center">Sisa Antrian: <span id="antrian-sisa2">___</span></p>
                                    <div class="text-center">
                                        <button type="button" class="btn btn-danger disabled me-2" style="width: 130px;" id="btn-panggil-2" onClick="panggil(2)">Panggil / Ulangi</button>
                                        <button type="button" class="btn btn-danger disabled" style="width: 130px;" id="btn-next-2" onClick="next(2)">Next</button>
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

    <audio id="myAudio">
        <source src="{{ asset('audio/tingtung.mp3') }}" type="audio/mpeg">
      </audio>

    <x-slot name="script">
        <script type="text/javascript">

            var loket = "{{ $loket }}";

            function getAntrian() {

                function update1() {
                    var url = "{{ route('antrian.getAntrianByLoket') . '?jenis=1' }}&loket=" + loket;
                    $.get(url, function(data, status){
                        document.getElementById("antrian-nomor1").innerText = data.nomor;
                        var status = "___";
                        if (data.status == null) {
                            status = "Belum dipanggil";
                            $("#btn-panggil-1").removeClass("disabled");
                            $("#btn-next-1").addClass("disabled");
                        }
                        else if (data.status == 1){
                            status = "Sudah dipanggil";
                            $("#btn-panggil-1").removeClass("disabled");
                            $("#btn-next-1").removeClass("disabled");
                        }

                        if (data.sisaAntrian == 0) {
                            $("#btn-next-1").addClass("disabled");
                        }
                        document.getElementById("antrian-status1").innerText = status;
                        document.getElementById("antrian-sisa1").innerText = data.sisaAntrian;
                    });

                    setTimeout(update1, 1000);
                }

                update1();

                function update2() {
                    var url = "{{ route('antrian.getAntrianByLoket') . '?jenis=2' }}&loket=" + loket;
                    $.get(url, function(data, status){
                        document.getElementById("antrian-nomor2").innerText = data.nomor;
                        var status = "___";
                        if (data.status == null) {
                            status = "Belum dipanggil";
                            $("#btn-panggil-2").removeClass("disabled");
                            $("#btn-next-2").addClass("disabled");
                        }
                        else if (data.status == 1){
                            status = "Sudah dipanggil";
                            $("#btn-panggil-2").removeClass("disabled");
                            $("#btn-next-2").removeClass("disabled");
                        }

                        if (data.sisaAntrian == 0) {
                            $("#btn-next-2").addClass("disabled");
                        }
                        document.getElementById("antrian-status2").innerText = status;
                        document.getElementById("antrian-sisa2").innerText = data.sisaAntrian;
                    });

                    setTimeout(update2, 1000);
                }

                update2();
            }

            getAntrian();

            function panggil(jenis) {
                var url = "{{ route('antrian.setAntrianByLoket') }}";
                $.post(url,
                {
                    _token: "{{ csrf_token() }}",
                    jenis: jenis,
                    loket: loket
                },
                function(data, status){
                    // alert("Data: " + data + "\nStatus: " + status);

                    Swal.fire({
                        title: "Berhasil!",
                        text: "Nomor Antrian berhasil dipanggil!",
                        icon: "success",
                        timer: 1000,
                        showConfirmButton: false
                    });

                    function onAudioEnded() {
                        // Buat teks yang ingin diucapkan
                        var textToSpeak = "Nomor antrian " + data.nomor + " silahkan menuju ke loket " + data.loket + " pendaftaran";

                        // Buat objek SpeechSynthesisUtterance
                        var utterance = new SpeechSynthesisUtterance(textToSpeak);
                        utterance.lang = 'id-ID';
                        utterance.rate = 0.8;

                        // Jalankan sintesis suara
                        speechSynthesis.speak(utterance);

                        // Hapus event listener setelah selesai
                        audio.removeEventListener('ended', onAudioEnded);
                    }

                    // Dapatkan elemen audio
                    var audio = document.getElementById("myAudio");

                    // Mainkan audio
                    audio.play();

                    // Tambahkan event listener untuk mengetahui kapan audio selesai diputar
                    audio.addEventListener('ended', onAudioEnded);
                });
            }

            function next(jenis) {
                var url = "{{ route('antrian.nextAntrianByLoket') }}";
                $.post(url,
                {
                    _token: "{{ csrf_token() }}",
                    jenis: jenis,
                    loket: loket
                },
                function(data, status){
                    // alert("Data: " + data + "\nStatus: " + status);
                });
            }
        </script>
    </x-slot>
</x-app-layout>
