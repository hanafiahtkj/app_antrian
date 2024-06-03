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
    <div class="d-flex align-items-center" style="height: 100%">
        <div class="row flex-fill">
            <div class="col">

                <div class="d-flex justify-content-center">
                    <div class="w-100 p-3">
                        <div class="row">
                            <div class="col d-flex justify-content-center">
                                <div>
                                    <div class="card text-bg-info mb-3 px-4 py-2 border border-3 shadow" style="min-width: 35rem; border-color:#435177!important">
                                        <div class="row no-gutters">
                                            <div class="col-md-3 align-self-center text-center">
                                                <img class="" height="100" src="{{ asset('img/icons8-mic-100.png') }}" alt="Card image"
                                                style="padding: 10px;
                                                border-radius: 50%;
                                                background-color: #ffff;">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card-body">
                                                    <p class="card-text fs-3 fw-semibold text-dark">Pemanggilan <br> Antrian</p>
                                                    <a href="{{ route('loket') . '?loket=1' }}" class="btn btn-light me-2">Loket 1</a>
                                                    <a href="{{ route('loket') . '?loket=2' }}" class="btn btn-light">Loket 2</a>
                                                </div><!--end card-body-->
                                            </div><!--end col-->
                                        </div><!--end row-->
                                    </div>
                                </div>
                            </div>
                            <div class="col d-flex justify-content-center">
                                <div>
                                    <div class="card text-bg-info mb-3 px-4 py-2 border border-3 shadow" style="min-width: 35rem; border-color:#435177!important">
                                        <div class="row no-gutters">
                                            <div class="col-md-3 align-self-center text-center">
                                                <img class="" height="100" src="{{ asset('img/icons8-monitor-100.png') }}" alt="Card image"
                                                style="padding: 10px;
                                                border-radius: 50%;
                                                background-color: #ffff;">
                                            </div>
                                            <div class="col-md-9">
                                                <div class="card-body">
                                                    <p class="card-text fs-3 fw-semibold text-dark">Monitor <br> Antrian</p>
                                                    <a href="{{ route('monitoring') }}" class="btn btn-light">Tampilan</a>
                                                </div><!--end card-body-->
                                            </div><!--end col-->
                                        </div><!--end row-->
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
</x-app-layout>

