<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-kategori">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama kategori</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kategori as $p)
                <tr>
                    <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $p->nama_kategori }}</td>
                    <td>
                        <button class="btn text-warning" data-toggle="modal" data-target="#modalFormkategori" data-mode="edit" data-id="{{ $p->id }}" data-nama_kategori="{{ $p->nama_kategori }}">
                            <i class=" fas fa-edit"></i>
                        </button>
                        <form method="post" action="{{ route('kategori.destroy', $p->id) }}" style="display: inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn text-danger delete-data" data-nama_kategori=""="{{ $p->nama_kategori }}">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>