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
                    <table class="table-bordered table">
                        <tr>
                            <th>
                                #
                            </th>
                            <td>Tiket Name</td>
                            <td>Harga</td>
                            <td>Jumlah</td>
                            <td>total</td>
                            <td></td>
                        </tr>
                        @foreach ($tiket as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" value="{{ $item['total'] }}" wire:model="tiketId">
                                </td>
                                <td>
                                    {{ $item['tiket'] }}
                                </td>
                                <td style="width: 120px">
                                    <input class="form-control" type="text" value="{{ $item['harga'] }}" readonly>
                                </td>
                                <td style="width: 76px">
                                    <input class="form-control" type="text" value="{{ $item['jumlah'] }}" readonly>
                                </td>
                                <td>
                                    <input class="form-control" type="text" value="{{ $item['total'] }}" readonly>
                                </td>
                                <td>
                                    <button class="btn btn-warning" type="button"
                                        wire:click="tambah([
                                            {{ $item['key']['tiket_id'] }},
                                            {{ $item['key']['user_id'] }},
                                            {{ $item['jumlah'] }}
                                            ])">+</button>
                                    <button class="btn btn-danger" type="button"
                                        wire:click="kurang([
                                        {{ $item['key']['tiket_id'] }},
                                        {{ $item['key']['user_id'] }},
                                        {{ $item['jumlah'] }}
                                        ])">-</button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <button class="btn btn-warning" wire:click="counting">Select Item</button>
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
                    <h2>
                        {{ $this->subtotal }}
                    </h2>
                </div>
                <div class="card-footer">
                    <button class="w-100 btn btn-warning" wire:click="proses"> Proses Pembayaran</button>
                </div>
            </div>
        </div>
    </div>
</div>
