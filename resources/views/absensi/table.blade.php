<div class="x_content">
    <div class="table-responsive">
        <table class="table table-compact table stripped" id="tbl-absensi">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Karyawan</th>
                    <th>Tanggal Masuk</th>
                    <th>Waktu Masuk</th>
                    <th>Status </th>
                    <th>Waktu Keluar</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($absensi as $p)
                <tr>
                    <td>{{ $i = !isset ($i) ? ($i = 1) : ++$i }}</td>
                    <td>{{ $p->nama_karyawan }}</td>
                    <td>{{ $p->tanggal_masuk }}</td>
                    <td>{{ $p->waktu_masuk }}</td>
                    <td> {{ $p->status}}
                    <!-- <div class="col-sm-10">
                        <select name="status" id="status" class="form-control">
                           {{-- <option value="">Status</option> --}}
                            <option value="masuk">Masuk</option>
                            <option value="cuti">Cuti</option>
                            <option value="libur">Libur</option> 
                        </select>
                    </div> -->
                    </td>
                        <td>{{ $p->waktu_keluar }}</td>
                        <td>
                            <button class="btn text-warning" data-toggle="modal" data-target="#modalFormabsensi" data-mode="edit" data-id="{{ $p->id }}" data-nama_karyawan="{{ $p->nama_karyawan }}" data-tanggal_masuk="{{ $p->tanggal_masuk }}" data-waktu_masuk="{{ $p->waktu_masuk }}" data-status="{{ $p->status }}" data-waktu_keluar="{{ $p->waktu_keluar }}">
                                <i class=" fas fa-edit"></i>
                            </button>
                            <form method="post" action="{{ route('absensi.destroy', $p->id) }}" style="display: inline">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn text-danger delete-data" data-nama_karyawan=""="{{ $p->nama_karyawan }}">
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