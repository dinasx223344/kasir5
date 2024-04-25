@extends('template/layout')

@push('style')
<style>
    /* Tambahkan gaya kustom Anda di sini */
    .card {
        margin-top: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #f5f5f5;
        border-bottom: 1px solid #ccc;
        padding: 10px;
        border-radius: 5px 5px 0 0;
    }

    .card-body {
        padding: 20px;
    }
</style>
@endpush

@section('content')
<section class="content">
    <div class="right_col" role="main">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Contact Us</h3>
                    </div>
                    <div class="card-body">
                        <img src="smk.jpg" alt="Foto Kantor">
                        <!-- <h5 class="card-title">Sejarah Aplikasi</h5>
                        <p>Aplikasi ini dibuat di Tahun 2024 sebagai salah satu syarat untuk mengikuti Ujian Kompetensi 
                            Keahlian di Jurusan Perangkat Lunak</p>
                        <hr>
                        <h5 class="card-title">Layanan Aplikasi</h5>
                        <p>JHDISHEBI</p>
                        <hr>
                        <h5 class="card-title">Layanan Aplikasi</h5>
                        <p>JHDISHEBI</p> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection