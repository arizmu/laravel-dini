<div class="container">
    <div class="row flex-center mb-5">
        <div class="col-lg-8 text-center">
            <h1 class="fw-bold fs-md-3 fs-lg-4 fs-xl-5">
                Tiket Price List
            </h1>
            <hr class="text-primary mx-auto my-4" style="height:3px; width:70px;" />
            <div class="py-3">
                <form wire:submit="search">
                    <input class="form-control" type="text" style="color: black" wire:model="query">

                    <button class="btn btn-info mt-2" type="submit">Cari Tiket</button>
                </form>
            </div>
        </div>
    </div>
    <h2>{{ $number }}</h2>
    <div class="row">
        @if ($data)
            @foreach ($data as $item)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://www.wiratourmakassar.com/images/malino-main.jpg"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->wisata }}</h5>
                            <p class="card-text">
                                Harga Tiket : {{ $item->harga_tiket_perorangan }}/Orang
                            </p>
                            <a class="btn btn-primary" href="#">Lihat</a>
                            <button class="btn btn-primary" type="button" wire:click="addChart({{ $item->id }})"
                                wire:confirm="Add Ticket to chart list ?">Add chart</button>
                            <a class="btn btn-primary" href="#">Buy</a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
