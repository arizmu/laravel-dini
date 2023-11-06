<div>
    <form wire:submit="search">
        <input class="form-control rounded" type="text" style="color: black" wire:model="query">
        <button class="btn btn-success mt-2" type="submit">cari destinasi</button>
    </form>

    <div class="row">
        @foreach ($data as $item)
            <div class="col-md-4 p-2">
                <div class="card border-primary border">
                    <img class="card-img-top" src="{{ wisataImg($item->id) }}" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{ $item['wisata'] }}</h5>
                        <p class="card-text">
                            {{ Str::words($item->desc, 15,'....') }}
                        </p>
                    </div>
                    <div class="card-body">
                        <a class="card-link fw-semibold" href="#">Read More</a>
                        {{-- <a class="card-link" href="#">Another link</a> --}}
                    </div>
                </div>
            </div>
        @endforeach
        {{ $data->links() }}
    </div>
</div>
