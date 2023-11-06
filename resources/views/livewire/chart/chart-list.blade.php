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
                        List Keranjang Tiket
                    </h5>
                </div>
                <div class="card-body">
                    <table class="table">
                        <tr>
                            <th>
                                #
                            </th>
                            <td>Tiket Name</td>
                            <td>Harga</td>
                            <td>Jumlah</td>
                            <td>total</td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox">
                            </td>
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
                        Subtotal
                    </h5>
                </div>
                <div class="card-body">

                </div>
                <div class="card-footer">
                    <button class="w-100 btn btn-warning"> Proses Pembayaran</button>
                </div>
            </div>
        </div>
    </div>
</div>
