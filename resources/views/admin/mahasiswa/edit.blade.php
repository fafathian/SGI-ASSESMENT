@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Edit Data Mahasiswa</h4>
                        <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST" class="forms-sample"
                            enctype="multipart/form-data">
                            @csrf
                            @method('patch')
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control" id="nim" autocomplete="off" name="nim"
                                    value="{{ $mahasiswa->nim }}" placeholder="nim">
                            </div>
                            <div class="form-group">
                                <label>Nama Mahasiswa</label>
                                <input type="text" class="form-control" id="nama" autocomplete="off" name="nama"
                                    value="{{ $mahasiswa->nama }}" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin:</label><br>
                                <input type="radio" id="male" name="jenis_kelamin" value="L"
                                    {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'L' ? 'checked' : '' }} required>
                                <label for="male">Laki-laki</label><br>
                                <input type="radio" id="female" name="jenis_kelamin" value="P"
                                    {{ old('jenis_kelamin', $mahasiswa->jenis_kelamin) == 'P' ? 'checked' : '' }} required>
                                <label for="female">Perempuan</label><br>
                            </div>
                            <div class="form-group">
                                <label>Tempat lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" autocomplete="off"
                                    name="tempat_lahir" value="{{ $mahasiswa->tempat_lahir }}" placeholder="Tempat Lahir">
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir"
                                    value="{{ $mahasiswa->tanggal_lahir ? $mahasiswa->tanggal_lahir->format('Y-m-d') : '' }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" placeholder="alamat" id="alamat"
                                    value="{{ old('alamat', default: $mahasiswa->alamat) }}" cols="30" rows="10"><?php echo "$mahasiswa->alamat"; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Jurusan</label>
                                <input type="text" class="form-control" id="jurusan" autocomplete="off" name="jurusan"
                                    value="{{ $mahasiswa->jurusan }}" placeholder="jurusan">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary me-2">Update Data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
