<div class="px-4">
    <div class="d-grid justify-content-start gap-4">
        <a class="btn btn-outline-primary" href="{{ route('chart.list') }}">Chart List</a>
        <a class="btn btn {{ !request()->is(route('chart.bayar')) ? 'btn-primary' : 'btn-outline-primary' }}"
            href="{{ route('chart.bayar') }}">Pembayaran</a>
        <a class="btn btn-outline-primary" href="{{ route('chart.aktif') }}">Tiket</a>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">
                        Pembayaran Tiket
                    </h5>
                    <span>
                        Nomor Rek. Pembayaran : <span class="text-warning">92929374799347</span>
                    </span>
                </div>
                <div class="card-body">
                    <table class="table-hover table-bordered table">
                        <tr>
                            <td></td>
                            <td>kode Transaksi</td>
                            <td>Jumlah Tiket</td>
                            <td>Total Harga</td>
                            <td>Status Pembayaran</td>
                            <td>Jatuh Tempo</td>
                        </tr>
                        @foreach ($data as $item)
                            <tr onclick="bayar(this)">
                                <td>
                                    <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#openModal"
                                        onclick="detail('{{ $item->id }}')">
                                        +
                                    </button>
                                </td>
                                <td>{{ $item->nomor_transaksi }}</td>
                                <td>
                                    @php
                                        $tiket = 0;
                                        $bayar = 0;
                                    @endphp
                                    @foreach ($item->detail as $value)
                                        @php
                                            $tiket += $value->jumlah_tiket;
                                            $bayar += $value->jumlah_tiket * $value->harga_tiket;
                                        @endphp
                                    @endforeach
                                    {{ $tiket }}
                                </td>
                                <td>{{ $bayar }}</td>
                                <td>
                                    @if ($item['status_bayar'] == 0)
                                        <span class="badge badge-danger p-2">Belum Bayar</span>
                                    @endif

                                    @if ($item['status_bayar'] == 1)
                                        <span class="badge badge-warning p-2">Proses Validasi</span>
                                    @endif
                                </td>
                                <td>
                                    {{ \Carbon\Carbon::parse($item->tanggal_exp)->format('d-m-y') }}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <form method="POST" action="{{ route('tiket.bayar') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h5 class="mt-2">
                            Kirim Bukti Bayar
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Nomor Transaksi</label>
                            <input class="form-control" id="kode-transaksi" name="kode" type="text" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">Jumlah Bayar</label>
                            <input class="form-control" id="jumlah-bayar" name="bayar" type="text" readonly>
                        </div>
                        <div class="form-group">
                            <label for="">ID Transfer</label>
                            <input class="form-control" name="transferId" type="text">
                            <span>
                                Nomor Rek. Pembayaran : 92929374799347
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="">File Bukti Bayar</label>
                            <input class="form-control" name="gambar" type="file">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="w-100 btn btn-warning" type="submit">Kirim Bukti Bayar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    {{-- modal --}}
    {{-- <div class="modal fade" id="openModal" role="dialog" aria-labelledby="openModal" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button class="close" data-dismiss="modal" type="button" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" data-dismiss="modal" type="button">Close</button>
                    <button class="btn btn-primary" type="button">Save changes</button>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- modal --}}
</div>
@push('js')
    <script>
        // function bayar
        function bayar(row) {
            var cells = row.cells;
            document.getElementById('kode-transaksi').value = row.cells[1].textContent;
            document.getElementById('jumlah-bayar').value = row.cells[3].textContent;
        }

        //function detail
        async function detail(item) {
            const url = "/tiket/dt/" + item;
            const response = await fetch(url);
            // console.log(url);
            if (!response.ok) {
                throw new Error(`HTTP error! Status: ${response.status}`);
            }
            const data = await response.json();
            console.log('Fetched data:', data);
        }
    </script>
@endpush
