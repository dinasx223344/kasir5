<head>
    <style>
        @media print {

            /* Sembunyikan elemen yang tidak perlu dicetak */
            body * {
                visibility: hidden;
            }

            /* Hanya menampilkan bagian yang ingin dicetak */
            #printableArea,
            #printableArea * {
                visibility: visible;
            }

            /* Stil khusus untuk bagian yang ingin dicetak */
            #printableArea {
                position: absolute;
                left: 0;
                top: 0;
            }
        }
    </style>
</head>

<body>
    <div id="printableArea">
        <!-- Konten yang ingin dicetak -->
        <h2>C A F E</h2>
        <h5>Jl. Siliwangi N0. 61 Cianjur</h5>
        <hr>

        @if(isset($transaksi))
        <h5>No. Faktur : {{$transaksi->id}} </h5>
        <h5> {{$transaksi->tanggal}} </h5>

        <table>
            <thead>
                <tr>
                    <th>Qty</th>
                    <th>Item</th>
                    <th>Harga</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transaksi->detailTransaksi as $item)
                <tr>
                    <td contenteditable="true">{{ $item->jumlah }}</td>
                    <td>{{ $item->menu->nama_menu }}</td>
                    <td>{{ number_format($item->menu->harga, 0, ',', '.') }}</td>
                    <td>{{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Total</td>
                    <td>{{ number_format($transaksi->total_harga, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>
        @else
        <p>No Transaction Found.</p>
        @endif
    </div>

    <!-- Tombol untuk mencetak -->
    <button onclick="printPage()">Cetak</button>

    <!-- Skrip untuk mencetak -->
    <script>
        function printPage() {
            window.print();
        }
    </script>
</body>