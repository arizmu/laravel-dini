<x-app-layout>
    @push('css')
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush
    <div class="container-fluid">
        <div class="card mb-4 shadow">
            <div class="card-header py-3">

                <div class="d-flex justify-content-between">
                    <h5>Transaksi</h5>
                    <a class="btn btn-info" href="{{ route('transaksi.create') }}">Buat Transaksi</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Wisata</th>
                                <th>Pelanggan</th>
                                <th>Jumlah Tiket</th>
                                <th>Harga Tiket</th>
                                <td>Total Harga</td>
                                <td>Status Pembayaran</td>
                                <td>Tanggal Transaksi</td>
                                <th>Action</th>
                        </thead>
                        <tbody>
                            @php
                                $number = 1;
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $number++ }}</td>
                                    <td>{{ $item->wisata->wisata }}</td>
                                    <td>{{ $item->pelanggan->nama ?? "" }}</td>
                                    <td>{{ $item->jumlah_tiket }}</td>
                                    <td>{{ $item->harga_tiket }}</td>
                                    <td>{{ $item->harga_tiket }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <span class="badge bg-success text-white">sudah bayar</span>
                                        @else
                                            <span class="badge bg-warning text-white">belum bayar</span>
                                        @endif
                                    </td>
                                    <td>{{ $item->tanggal_pemesanana }}</td>
                                    <td>
                                        {{-- <form action="{{ route('pelanggan.destroy', $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE') --}}
                                        @if ($item->status == 0)
                                            <a class="btn btn-warning" href="{{ route('transaksi.edit', $item->id) }}"
                                                href="">Edit</a>
                                        @else
                                        @endif
                                        {{-- <button class="btn btn-danger">Hapus</button> --}}
                                        {{-- </form> --}}
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
