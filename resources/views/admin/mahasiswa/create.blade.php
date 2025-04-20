@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Tambah Data Mahasiswa</h4>
                        <form action="{{ route('mahasiswa.store') }}" method="post" class="forms-sample"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" id="nim" autocomplete="off" name="nim"
                                    placeholder="nim">
                            </div>
                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama" autocomplete="off" name="nama"
                                    placeholder="nama">
                            </div>
                            <div class="form-group">
                                <label>Jenis kelamin :</label> <br>
                                <input type="radio" id="male" name="jenis_kelamin" value="L" required>
                                <label for="male">Laki-laki</label><br>
                                <input type="radio" id="female" name="jenis_kelamin" value="P" required>
                                <label for="female">Perempuan</label><br>
                            </div>
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" autocomplete="off"
                                    name="tempat_lahir" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" autocomplete="off"
                                    name="tanggal_lahir" placeholder="Tanggal Lahir">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" cols="30" rows="10" autocomplete="off" placeholder="Alamat"></textarea>
                            </div>
                            <div class="form-group">
                                <label>jurusan</label>
                                <input type="text" class="form-control" id="jurusan" autocomplete="off" name="jurusan"
                                    placeholder="jurusan">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary me-2" onclick="return confirm('Apakah data mahasiswa ini sudah benar?');">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
