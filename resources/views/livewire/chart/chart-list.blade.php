<div class="px-4">
    <div class="d-grid justify-content-start gap-4">
        <a class="btn {{ !request()->is(route('chart.list')) ? 'btn-primary' : 'btn-outline-primary'}}" href="{{ route('chart.list') }}">Chart List</a>
        <a class="btn btn-outline-primary" href="{{ route('chart.bayar') }}">Pembayaran</a>
        <a class="btn btn-outline-primary" href="{{ route('chart.aktif') }}">Tiket</a>
    </div>

    <div class="row mt-4">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="mt-2">
                        List Keranjang Tiket
                    </h5>
                </div>
                {{-- {{$data}} --}}
                <div class="card-body">
                    <table class="table-bordered table" id="itemTable">
                        <thead>
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
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr class="itemRow">
                                    <td>
                                        <input class="form-checkbox" type="checkbox"
                                            value="{{ $item['tiket_id'] }}" wire:model="tiketId"
                                            onchange="subtotal()">
                                    </td>
                                    <td>
                                        {{ $item['tiket'] }}
                                    </td>
                                    <td style="width: 120px">
                                        {{ $item['harga'] }}
                                    </td>
                                    <td style="width: 76px">
                                        {{ $item['jumlah'] }}
                                    </td>
                                    <td>
                                        {{ $item['total'] }}
                                    </td>
                                    <td>
                                        <button class="btn btn-warning" type="button"
                                            wire:click="tambah([
                                            {{ $item['tiket_id'] }},
                                            {{ $item['user_id'] }},
                                            {{ $item['jumlah'] }}
                                            ])">+</button>
                                        <button class="btn btn-danger" type="button"
                                            wire:click="kurang([
                                        {{ $item['tiket_id'] }},
                                        {{ $item['user_id'] }},
                                        {{ $item['jumlah'] }}
                                        ])">-</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{-- <button class="btn btn-warning" wire:click="counting">Select Item</button> --}}
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
                    <h2 id="subTotal">0
                    </h2>
                    <hr>
                    <div class="form-group">
                        <label for="">Tanggal Kunjungan</label>
                        <input type="date" class="form-control" wire:model="tanggal">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="w-100 btn btn-warning" wire:click="proses">Pesan Tiket</button>
                </div>
            </div>
        </div>

    </div>
</div>

@push('js')
    <script>
        function subtotal() {
            var checkboxesItem = document.getElementsByClassName("form-checkbox");
            var subTotal = 0;
            document.getElementById('subTotal').textContent = 0;

            if (checkboxesItem.length > 0) {
                for (let i = 0; i < checkboxesItem.length; i++) {
                    if (checkboxesItem[i].checked) {
                        var row = checkboxesItem[i].parentNode.parentNode;
                        var harga = parseFloat(row.cells[4].textContent);
                        subTotal += harga;
                        document.getElementById('subTotal').textContent = subTotal;
                    }
                }
            } else {
                console.log('tidak ada item yang di pilih')
            }
        }
    </script>
@endpush
