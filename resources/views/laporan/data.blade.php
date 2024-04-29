<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-laporan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Transaksi ID</th>
                    <th>Menu ID</th>
                    <th>Jumlah</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detailTransaksi as $p)
                <tr>
                    <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $p->transaksi_id }}</td>
                    <td>{{ $p->menu->nama_menu }}</td>
                    <td>{{ $p->jumlah }}</td>
                    <td>{{ $p->subtotal }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>