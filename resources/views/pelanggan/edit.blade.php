<x-app-layout>
    @push('css')
        <link href="{{ asset('template/vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    @endpush
    <div class="container-fluid">
        <div class="card mb-4 shadow">
            <div class="card-header py-3">

                <div class="d-flex justify-content-between">
                    <h5>Form Input </h5>
                    <a class="btn btn-info" href="{{ route('pelanggan.index') }}">Kembali</a>
                </div>
            </div>
            <form action="{{ route('pelanggan.update', $pelanggan->id) }}" method="POST">
                @method('PATCH')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Nama pelanggan</label>
                        <input class="form-control" name="nama" type="text" value="{{ $pelanggan->nama }}">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea class="form-control" name="alamat">{{ $pelanggan->alamat }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Telpon</label>
                        <input class="form-control" name="telp" type="text"
                            value="{{ $pelanggan->telp }}">
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input class="form-control" name="email" type="email"
                            value="{{ $pelanggan->email }}">
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
