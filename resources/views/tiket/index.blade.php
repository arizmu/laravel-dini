<x-app-layout>
    @push('css')
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush
    <div class="container-fluid">
        <div class="card mb-4 shadow">
            <div class="card-header py-3">

                <div class="d-flex justify-content-between">
                    <h5 class="mt-2">Penjualan Tiket</h5>
                    <a class="btn btn-info" href="{{ route('tiketing.create') }}">Tambah tiket baru</a>
                </div>
            </div>
            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-error" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Tiket Name</th>
                                <th>Harga</th>
                                <th>Jumlah Tiket</th>
                                <th>Masa Belaku</th>
                                <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($tiket as $item)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->harga }}</td>
                                    <td>{{ $item->kouta_tiket }}</td>
                                    <td>{{ $item->masa_berlaku }}</td>
                                    <td>
                                        <form action="{{ route('tiketing.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-warning" href="{{ route('wisata.edit', $item->id) }}"
                                                href="">Edit</a>
                                            <button class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    @push('js')
        <!-- Page level plugins -->
        <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

        <script>
            hapus() {

            }
        </script>
    @endpush
</x-app-layout>
