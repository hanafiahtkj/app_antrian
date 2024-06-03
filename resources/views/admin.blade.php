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
                        <div class="text-end">
                            <!-- <h5 class="card-title">Periode</h5> -->
                            <a
                                href="{{ route('admin.user.create') }}"
                                :preserve-state="true"
                                class="btn btn-primary"
                                ><i class="fas fa-plus-circle"></i> Tambah</a
                            >
                        </div>
                    </div>
                    <!--end card-header-->
                    <div class="card-body">
                        <div class="table-responsive">
                            <table
                                class="table table-striped"
                                id="datatables"
                                style="width: 100%"
                            >
                                <thead class="">
                                    <tr>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <th style="max-width: 180px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $us)
                                        <tr>
                                            <td>{{ $us->name }}</td>
                                            <td>{{ $us->email }}</td>
                                            <td>
                                                <div class="button-items">
                                                    <a href="{{ route('admin.user.edit', $us->id) }}" type="button" class="btn btn-secondary edit-link" data-user-id="{{ $us->id }}">Edit</a>
                                                    <button type="button" class="btn btn-danger delete-link" data-user-id="{{ $us->id }}">Hapus</button>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title end breadcrumb -->
    </div>

    <x-slot name="script">
        <script type="text/javascript">

            $(document).on("click", ".delete-link", function (e) {
                e.preventDefault();
                const userId = $(this).data("user-id");
                var url = '{{ route("admin.user.destroy", ":id") }}';
                url = url.replace(':id', userId);

                Swal.fire({
                    title: "Yakin ingin menghapus?",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    cancelButtonColor: "#d33",
                    reverseButtons: true,
                }).then((result) => {
                    if (result.isConfirmed) {
                        axios
                            .post(url)
                            .then((response) => {
                                Swal.fire("Berhasil dihapus!", "", "success");
                                window.location.href = "{{ route('admin') }}"
                            })
                            .catch((error) => {
                                console.error("Failed to delete user:", error);
                            });
                    }
                 });
            });

        </script>
    </x-slot>
</x-app-layout>

