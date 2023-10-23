<x-app-layout>
    @push('css')
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush
    <div class="container-fluid">
        <div class="card mb-4 shadow">
            <div class="card-header py-3">

                <div class="d-flex justify-content-between">
                    <h5>Data list pelanggan</h5>
                    <a class="btn btn-info" href="{{ route('pelanggan.create') }}">Tambah Data</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama pelanggan</th>
                                <th>Alamat</th>
                                <th>Telpon</th>
                                <th>Email</th>
                                <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->telp }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>
                                        <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a class="btn btn-warning" href="{{ route('pelanggan.edit', $item->id) }}"
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
    @endpush
</x-app-layout>
