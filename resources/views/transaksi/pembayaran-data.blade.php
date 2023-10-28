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
                <div class="row">
                    <div class="col-md-7">

                        <div class="table-responsive">
                            <table class="table-bordered table" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Wisata</th>
                                        <th>Pelanggan</th>
                                        <th>Jummlah Tiket</th>
                                        <th>Harga Tiket</th>
                                        <td>Total Harga</td>
                                        <th>Action</th>
                                </thead>
                                <tbody>
                                    @php
                                        $number = 1;
                                    @endphp
                                    @foreach ($data as $item)
                                        <tr id="row-{{ $item->id }}">
                                            <td>{{ $number++ }}</td>
                                            <td>{{ $item->wisata->wisata }}</td>
                                            <td>{{ $item->pelanggan->nama ?? "" }}</td>
                                            <td>{{ $item->jumlah_tiket }}</td>
                                            <td>{{ $item->harga_tiket }}</td>
                                            <td>{{ $item->total_harga }}</td>
                                            <td>
                                                <button class="btn btn-info"
                                                    onclick="getData({{ $item->id }})">Bayar</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-header">
                                <h5>Form Pembayaran</h5>
                            </div>

                            <form action="{{ route('transaksi.pembayaran.proses') }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Total Harga</label>
                                        <input class="form-control" id="transaksi_id" name="transaksi_id" type="text"
                                            readonly hidden>
                                        <input class="form-control" id="totalHarga" name="total_harga" type="text"
                                            readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jumlah Bayar</label>
                                        <input class="form-control" id="jumlahBayar" name="jumlah_bayar" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Kembalian</label>
                                        <input class="form-control" id="kembalian" name="kembalian" type="text"
                                            readonly>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button class="btn btn-info" type="submit">Proses Pembayaran</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @push('js')
        <!-- Page level plugins -->
        <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script>
            function getData(id) {
                var row = document.getElementById("row-" + id)
                var cells = row.getElementsByTagName("td")
                // console.log(cell)

                var cellValues = [];

                for (var i = 0; i < cells.length; i++) {
                    cellValues.push(cells[i].textContent);
                }
                const totalHarga = document.getElementById("totalHarga").value = cellValues[5];
                const code = document.getElementById("transaksi_id").value = cellValues[0];
                // console.log(cellValues);
            }

            document.getElementById("jumlahBayar").onchange = function() {
                // console.log('test')
                const totalharga = document.getElementById("totalHarga").value
                const jumlahBayar = document.getElementById("jumlahBayar").value

                const hitung = jumlahBayar - totalharga
                if (hitung < 0) {
                    alert('jumlah bayar kurang')
                } else {
                    const kembalian = document.getElementById("kembalian").value = hitung
                }
            }
        </script>
    @endpush
</x-app-layout>
