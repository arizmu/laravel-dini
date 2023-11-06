<div class="px-4">
    <div class="d-grid justify-content-start gap-4">
        <a class="btn btn-outline-primary" href="{{ route('chart.list') }}">Chart List</a>
        <a class="btn btn-outline-primary" href="{{ route('chart.bayar') }}">Pembayaran</a>
        <a class="btn btn-outline-primary" href="{{ route('chart.aktif') }}">Tiket Aktif</a>
        <a class="btn btn-outline-primary" href="{{ route('chart.exp') }}">Tiket Expire</a>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">
                        Pembayaran Tiket
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <td>Nomor Transaksi</td>
                            <td>Jumlah Tiket</td>
                            <td>Total Harga</td>
                            <td>Status Pembayaran</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">
                        Kirim Bukti Bayar
                    </h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nomor Transaksi</label>
                        <input type="text" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Jumlah Bayar</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">ID Transfer</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">File Bukti Bayar</label>
                        <input type="file" class="form-control">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="w-100 btn btn-warning"> Kirim Bukti Bayar</button>
                </div>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
    </script>
@endpush

