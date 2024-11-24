<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Nota!</title>
</head>

<body>
    <div class="container">
        <div class="row justify-center">
            <h1 class="text-center mb-3">Data Penjualan Produk<span class="text-primary"> LISAMAN</span></h1>
            <p class="text-center">Tanggal : 10/10/2024 - 11/10/2024</p>
        </div>
    </div>

    @if ($terjual->count() > 0)
    <table class="table table-sm table-bordered table-striped mt-4 text-center">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Total Pembayaran</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($terjual as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->name }}</td>
                    <td>Rp {{ number_format($item->payment->amount, 0, ',', '.') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <h3 class="text-center mt-3">Data Penjualan Tidak Ditemukan</h3>
    @endif
</body>

</html>
