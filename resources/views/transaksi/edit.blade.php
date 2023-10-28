<x-app-layout>
    @push('css')
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush
    <div class="container-fluid">
        <div class="card mb-4 shadow">
            <div class="card-header py-3">

                <div class="d-flex justify-content-between">
                    <h5>Form Transaksi</h5>
                    <a class="btn btn-info" href="{{ route('transaksi.index') }}">Trancaksi Data</a>
                </div>
            </div>
            <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">List Wisata</label>
                                <select class="form-control" id="wisataName" name="wisata">
                                    <option value="">Pilih</option>
                                    @foreach ($wisata as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($transaksi->wisata_id === $item->id) selected @endif>
                                            {{ $item->wisata }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Pelanggan</label>
                                <select class="form-control" id="pelanggan" name="pelanggan">
                                    <option value="">Pilih</option>
                                    @foreach ($data as $item)
                                        <option value="{{ $item->id }}"  @if ($transaksi->pelanggan_id === $item->id) selected @endif>{{ $item->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Harga Tiket</label>
                                <input class="form-control" id="hargaTiket" name="harga" type="number" readonly value="{{$transaksi->harga_tiket}}">
                            </div>
                            <div class="form-group">
                                <label for="">Jumlah Tiket</label>
                                <input class="form-control" id="jumlahTiket" name="jumlah" type="number" value="{{ $transaksi->jumlah_tiket }}">
                            </div>
                            <div class="form-group">
                                <label for="">Total Harga</label>
                                <input class="form-control" id="totalHarga" name="total" type="number" readonly value="{{$transaksi->total_harga}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-info" type="submit">Proses Transaksi</button>
                    <button class="btn btn-warning" type="reset">Reset</button>
                </div>
            </form>
        </div>

    </div>

    @push('js')
        <script>
            const wisata = document.getElementById('wisataName');
            wisata.addEventListener('change', function() {
                const selectedOption = wisata.options[wisata.selectedIndex];
                const selectedValue = selectedOption.value;
                // console.log(selectedValue);
                const url = `/get-harga/${selectedValue}`; // Use '=' to assign the URL value
                console.log(url);
                fetch(url)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error(`Network response was not ok: ${response.status}`);
                        }
                        return response.json();
                    })
                    .then(data => {
                        const harga = data.response
                        document.getElementById('hargaTiket').value = harga
                        console.log('Data received:', data.response);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });

            document.getElementById('jumlahTiket').onchange = function() {
                const HargaTiket = document.getElementById('hargaTiket').value;
                if (HargaTiket) {
                    const jumlahTiket = document.getElementById('jumlahTiket').value;
                    const totalHarga = document.getElementById('totalHarga').value = jumlahTiket * HargaTiket;
                } else {
                    alert("Pilih Wisata terlebih dahulu")
                }
            }
        </script>
    @endpush
</x-app-layout>
