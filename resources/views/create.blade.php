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
    <div class="align-items-center">
        <div class="row">
            <div class="col">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Formulir User</h4>
                        {{-- <p class="text-muted mb-0">Basic example to demonstrate Bootstrap’s form styles.</p> --}}
                    </div><!--end card-header-->
                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.user.store') }}">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1">Nama</label>
                                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail2">Username</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail2" aria-describedby="emailHelp" placeholder="Username" required>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-de-primary">Simpan</button>
                            <a href="{{ route('admin') }}" class="btn btn-de-danger">Batal</a>
                        </form>
                    </div><!--end card-body-->
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
    </div>
</x-app-layout>

