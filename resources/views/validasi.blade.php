<x-app-layout>
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5 class="mt-2">Validasi Tiket</h5>
        </div>
        <div class="card mt-2">
            <div class="card-header">
                <h5>Data Tiket</h5>
            </div>
            <div class="card-body">
                <table class="table-hover table-bordered table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Transaksi</th>
                            <th>Pelanggan</th>
                            <th>Jumlah Tiket</th>
                            <th>Total Bayar</th>
                            <th>Tanggal Bayar</th>
                            <th>Bukti TF</th>
                            <th></th>
                        </tr>
                    </thead>
                    @php
                        $number = 1;
                    @endphp
                    <tbody>
                        @foreach ($data as $item)
                            <tr>
                                <td>{{ $number++ }}</td>
                                <td>{{ $item->nomor_transaksi }}</td>
                                <td>{{ $item->nama_pelanggan }}</td>
                                <td>
                                    @php
                                        $tiket = 0;
                                    @endphp
                                    @foreach ($item->detail as $value)
                                       @php
                                           $tiket += $value->jumlah_tiket;
                                       @endphp
                                    @endforeach
                                    {{ $tiket }}
                                </td>
                                <td>{{ $item->jumlah_bayar }}</td>
                                <td>{{ $item->tanggal_bayar }}</td>
                                <td>
                                    <img src="{{ asset('storage/'. $item->file_bukti_bayar) }}" alt="" style="width: 100px">
                                </td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="{{route('tiket.validasi.proses', $item->id)}}">Proses Validasi</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
