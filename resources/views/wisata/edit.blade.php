<x-app-layout>
    @push('css')
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush
    <div class="container-fluid">
        <div class="card mb-4 shadow">
            <div class="card-header py-3">

                <div class="d-flex justify-content-between">
                    <h5>Form Update Wisata </h5>
                    <a class="btn btn-info" href="{{ route('wisata.index') }}">Kembali</a>
                </div>
            </div>
            <form action="{{ route('wisata.update', $wisata->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama Wisata</label>
                        <input class="form-control" name="wisata" type="text" value="{{ $wisata->wisata }}">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat lokasi</label>
                        <textarea class="form-control" name="lokasi">{{ $wisata->lokasi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Harga Tiket</label>
                        <input class="form-control" name="harga" type="text"
                            value="{{ $wisata->harga_tiket_perorangan }}">
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-warning">
                        Reset Form
                    </button>
                    <button class="btn btn-primary">
                        Simpan Data
                    </button>
                </div>
            </form>
        </div>

    </div>

    @push('js')
        <!-- Page level plugins -->
        <script src="{{ asset('template/vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    @endpush
</x-app-layout>
