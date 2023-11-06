<x-guest-layout>
    <section class="pt-5">
        <div class="d-flex justify-content-center container text-center">
            <div class="card mt-4" style="width: 30rem">
                <div class="card-header bg-info">
                    <h4 class="mt-1 text-white">
                        {{ Str::upper($data->title) }}
                    </h4>
                </div>
                <div class="card-body bg-secondary item-center">
                    <table class="table-bordered table">
                        <tr>
                            <td colspan="2">
                                <h5 class="text-white">DETAIL</h5>
                            </td>
                        </tr>
                        @if ($tiket)
                            @foreach ($tiket as $item)
                                <tr class="text-warning">
                                    <td style="width: 50%">{{ $item['wisata'] }}</td>
                                    <td>{{ $item['jumlah_tiket'] }} Tiket</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="2">
                                    <h5 class="text-warning">
                                        Single Tiket
                                    </h5>
                                </td>
                            </tr>
                        @endif

                        <td colspan="2">
                            <h4 class="text-white">
                                Rp. {{ $data->harga }}
                            </h4>
                        </td>
                    </table>
                </div>
                <div class="card-footer bg-info">
                    {{-- <input type="number" class="form-control" value="1"> --}}
                    <a class="btn btn-warning" href="{{ route('add.chart.tiket', $data->id) }}">Add to chart</a>
                </div>
            </div>
        </div>
    </section>
</x-guest-layout>
