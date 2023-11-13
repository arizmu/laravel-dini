<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Tiket - Wisata</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    </head>

    <body onload="printPage()">
        <div style="margin-top: 50pt; padding: 20pt">
            <div class="row">
                <div class="col-md-2">Pelanggan - </div>
                <div class="col-md-4 fw-bold">{{ $tiket->nama_pelanggan }}</div>
                <div class="col-md-6"></div>
            </div>
            <div class="row">
                <div class="col-md-2">Tanggal Kunjungan - </div>
                <div class="col-md-4 fw-bold">{{ \Carbon\Carbon::parse($tiket->tanggal_exp)->format('Y-M-d') }}</div>
                <div class="col-md-6"></div>
            </div>

            @php
                $number = 1;
            @endphp
            <table class="table-bordered table" style="margin-top: 10pt">
                <tr>
                    <tr>
                        <th>Tiket</th>
                        <th>wisata</th>
                        <th>Jumlah Tiket</th>
                    </tr>
                </tr>
                {{-- {{$detail}} --}}
                @foreach ($detail as $item)
                    <tr>
                        <td rowspan="{{$number + count( $item['wisata'])}}">{{ $item['nama'] }}</td>
                        {{-- <td colspan="4">{{ $item['nama'] }}</td> --}}
                    </tr>
                    @foreach ($item['wisata'] as $val)
                        <tr>
                            <th>
                                {{ $val['nama_wisata'] }}
                            </th>
                            <td>
                                {{ $val['jumlah_tiket'] }}
                            </td>
                        </tr>
                    @endforeach
                @endforeach
            </table>
        </div>
        <script>
            function printPage() {
                window.print();
            }
        </script>
    </body>

</html>
