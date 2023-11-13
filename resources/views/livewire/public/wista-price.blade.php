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
    <div class="row">
        @if ($data)
            @foreach ($data as $item)
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-top" src="https://www.wiratourmakassar.com/images/malino-main.jpg"
                            alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->title }}</h5>
                            <p class="card-text">
                                Harga Tiket : Rp. {{ $item->harga }}
                            </p>
                            <a class="btn btn-primary" href="{{ route('tiket.detail', $item->id) }}">Lihat</a>

                            {{-- <a class="btn btn-warning text-white" href="{{ route('add.chart.tiket', $item->id) }}">Add
                                to chart</a> --}}
                            <button class="btn btn-warning text-white" onclick="addChart('{{ $item->id }}')">Add
                                to chart</button>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<script>
    async function addChart(item) {
        Swal.fire({
            title: "Konfirmasi?",
            text: "Tiket baru ditambahkan kedalam keranjang tiket!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Iya, Tambahkan!",
            cancelButtonText: "Tidak"
        }).then(async (result) => {
            if (result.isConfirmed) {
                try {
                    const url = "/add/chart/" + item;

                    // Add the fetch call to get the response
                    const response = await fetch(url);

                    // Check if the response is ok
                    if (!response.ok) {
                        throw new Error(`HTTP error! Status: ${response.status}`);
                    }

                    // Parse the JSON response
                    const data = await response.json();
                    // console.log('Fetched data:', data);

                    Swal.fire({
                        title: "Berhasil!",
                        text: "Tiket telah ditambahkan.",
                        icon: "success"
                    });

                } catch (error) {
                    console.error('Error fetching data:', error);

                    Swal.fire({
                        title: "Gagal!",
                        text: "Terjadi kesalahan saat menambahkan tiket.",
                        icon: "error"
                    });
                }
            } else {
                Swal.fire({
                    title: "Batal!",
                    text: "Tiket batal ditambahkan.",
                    icon: "warning"
                });
            }
        });
    }
</script>
