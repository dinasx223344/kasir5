<style>
    body {
        font-family: Arial, sans-serif;
        margin: 20px;
    }

    .container-box {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .container-box h2,
    .container-box h3 {
        text-align: center;
        margin-bottom: 10px;
    }

    .container-box table {
        width: 100%;
        border-collapse: collapse;
    }

    .container-box table,
    .container-box th,
    .container-box td {
        border: 3px solid transparent;
    }

    h2 {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 10px;
        text-align: center;
    }

    h3 {
        font-size: 18px;
        font-weight: bold;
        margin-bottom: 5px;
        text-align: center;
    }

    table {
        width: 100%;
        border-spacing: 0;
        border-collapse: collapse;
        margin: auto;
    }

    th,
    td {
        border: 1px solid transparent;
        padding: 8px;
        text-align: center;
    }

    th:first-child,
    td:first-child {
        padding-left: 20px;
    }

    th:last-child,
    td:last-child {
        padding-right: 20px;
    }

    thead {
        background-color: #f5f5f5;
    }

    tfoot {
        background-color: #f5f5f5;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f0f0f0;
    }

    .alert {
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid transparent;
        border-radius: 4px;
    }

    .alert-danger {
        background-color: #f2dede;
        border-color: #ebccd1;
        color: #a94442;
    }
</style>

<body>
    <div class="container-box">
        <h2>Peace Cafe</h2>
        <h3>Cianjur</h3>
        <hr>

        @if(isset($transaksi))
        <h3>NO. FAKTUR : {{ $transaksi->id }}</h3>
        <h3>Tanggal : {{ $transaksi->tanggal }}</h3>

        <table border="0">
            <thead>
                <tr>
                    <td>Qty</td>
                    <td>Item</td>
                    <td>Harga</td>
                    <td>Subtotal</td>
                </tr>
            </thead>
            <tbody>
                @foreach($transaksi->detailTransaksi as $item)
                <tr>
                    <td>{{ $item->jumlah }}</td>
                    <td>{{ $item->menu->nama_menu }}</td>
                    <td>{{ number_format($item->menu->harga, 0, "," , ".") }}</td>
                    <td>{{ number_format($item->subtotal, 0, "," , ".") }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="1">Total</td>
                    <td></td>
                    <td></td>
                    <td colspan="4">{{ number_format($transaksi->total_harga,0,",",".") }}</td>
                </tr>
            </tfoot>
        </table>
        @else
        <p>No transaction found.</p>
        @endif
    </div>
</body>