<div class="px-4">
    <div class="d-grid justify-content-start gap-4">
        <a class="btn btn-outline-primary" href="{{ route('chart.list') }}">Chart List</a>
        <a class="btn btn-outline-primary" href="{{ route('chart.bayar') }}">Pembayaran</a>
        <a class="btn {{ !request()->is(route('chart.aktif')) ? 'btn-primary' : 'btn-outline-primary'}}" href="{{ route('chart.aktif') }}">Tiket</a>
    </div>
    <div class="card mt-4">
        <div class="card-header"></div>
        <div class="card-body">
            <table class="table-bordered table">
                <tr>
                    <th>kode Transaksi</th>
                    <th>kode Bayar</th>
                    <td>Tanggal Bayar</td>
                    <td>Jumlah Bayar</td>
                    <td>Bukti Bayar</td>
                    <td>Tanggal Kunjungan</td>
                    <td>Tanggal Exp Tiket</td>
                    <td>Cetak Tiket</td>
                </tr>
                @foreach ($data as $item)
                    <tr>
                        <td>
                            {{ $item->nomor_transaksi }}
                        </td>
                        <td>
                            {{ $item->kode_pembayaran }}
                        </td>
                        <td>
                            {{ $item->tanggal_bayar }}
                        </td>
                        <td>
                            {{ $item->jumlah_bayar }}
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $item->file_bukti_bayar) }}" alt=""
                                style="width: 100px">
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($item->tanggal_exp)->format('d-m-y') }}
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($item->tanggal_exp)->format('d-m-y') }}
                        </td>
                        <td>
                            @if ($item->validasi_status)
                                <a href="{{route('tiket.lihat.detail', $item->id)}}" class="btn btn-sm btn-info" target="_blank">
                                    Lihat Tiket
                                </a>
                                {{-- <a class="btn btn-secondary" href="{{ route('cetak.tiket', $item->id) }}"
                                    target="_blank">Cetak Tiket</a> --}}
                            @endif
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
