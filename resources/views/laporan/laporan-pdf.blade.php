<!DOCTYPE html>
<html>

<head>
    <style>
        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #ffff00;
            color: white;
            text-align: center;
        }

        h1 {
            text-align: center;
        }
    </style>
</head>

<body>

    <h1>Data Laporan</h1>
    <table id="customers">
        <tr>
            <th>No</th>
            <th>Transaksi ID</th>
            <th>Menu ID</th>
            <th>Jumlah ID</th>
            <th>Subtotal ID</th>
        </tr>
        @php
        $no = 1;
        @endphp
        @foreach ($detailTransaksi as $p)
        <tr>
            <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
            <td>{{ $p->transaksi_id }}</td>
            <td>{{ $p->menu->nama_menu }}</td>
            <td>{{ $p->jumlah }}</td>
            <td>{{ $p->subtotal }}</td>
        </tr>
        @endforeach
    </table>

</body>

</html>