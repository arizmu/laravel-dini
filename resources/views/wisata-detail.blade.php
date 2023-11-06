<x-guest-layout>
    <section class="pt-5" id="wisata-populer">
        <div class="container text-center">
            <h2>{{ $wisata->wisata }}</h2>
            <img src="{{ wisataImg($wisata->id) }}" alt="" style="width: 60%" class="mt-2">
            <div class="mt-2">
                {{ $wisata->desc }}
            </div>
        </div>
    </section>
</x-guest-layout>
