<x-app-layout>
    @push('css')
    @endpush
    <div class="container-fluid">
        <div class="d-flex justify-content-between">
            <h5 class="mt-2">Form Tiket</h5>
            <a class="btn btn-info" href="{{ route('tiketing.create') }}">Tambah tiket baru</a>
        </div>
        <form action="{{ route('tiketing.store') }}" method="post">
            @csrf
            <div class="row mt-3">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-header">
                            {{-- Wisata List --}}
                        </div>
                        <div class="card-body">
                            <table class="table-hover table-bordered table">
                                @foreach ($wisata as $item)
                                    <tr>
                                        <td>
                                            <input name="item[{{$item->wisata}}][]" type="checkbox"
                                                value="{{ $item->id }}">
                                        </td>
                                        <td style="width: 300pt">{{ $item->wisata ?? '' }}</td>
                                        <td>
                                            <input class="form-control" name="item[{{$item->wisata}}][]"
                                                type="number">
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Tiket Title</label>
                                <input class="form-control" name="title" type="text">
                            </div>
                            <div class="form-group">
                                <label for="">Harga Tiket</label>
                                <input class="form-control" name="harga" type="number">
                            </div>
                            <div class="form-group">
                                <label for="">Kouta Tiket</label>
                                <input class="form-control" name="kouta_tiket" type="number">
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan / Informasi </label>
                                <textarea class="form-control" name="desc"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Masa Belaku</label>
                                <input class="form-control" name="masa_berlaku" type="date">
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-warning" type="reset">Reset Form</button>
                            <button class="btn btn-primary" type="submit">Buat Tiket</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @push('js')
    @endpush
</x-app-layout>
