@extends('layouts.admin')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="float-start">Tabel Mahasiswa</h4>
                                    </div>
                                    <div class="col-md-3">
                                        <a href="{{ route('mahasiswa.create') }}"
                                            class="btn btn-primary btn-rounded btn-fw float-end">Tambah Data</a>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{ route('mahasiswa.index') }}" method="GET" class="mb-3">
                                            <div class="input-group">
                                                <input type="text" name="search" class="form-control"
                                                    placeholder="Search" value="{{ request('search') }}">
                                                <button class="btn btn-primary btn-rounded btn-fw float-end"
                                                    type="submit">Search</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="table-responsive pt-3">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                No.
                                            </th>
                                            <th>
                                                NIM
                                            </th>
                                            <th>
                                                Nama Mahasiswa
                                            </th>
                                            <th>
                                                Jenis Kelamin
                                            </th>
                                            <th>
                                                Tempat Lahir
                                            </th>
                                            <th>
                                                Tanggal Lahir
                                            </th>
                                            <th>
                                                Alamat
                                            </th>
                                            <th>
                                                Jurusan
                                            </th>
                                            <th>
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($mahasiswa->isEmpty())
                                            <tr>
                                                <td colspan="9" class="text-center">Data tidak ditemukan</td>
                                            </tr>
                                        @else
                                            @foreach ($mahasiswa as $result => $d)
                                                <tr>
                                                    <td>
                                                        {{ $result + $posts->firstitem() }}
                                                    </td>

                                                    <th>
                                                        {{ $d->nim }}
                                                    </th>
                                                    <td>
                                                        {{ $d->nama }}
                                                    </td>
                                                    <th>
                                                        {{ $d->jenis_kelamin }}
                                                    </th>
                                                    <th>
                                                        {{ $d->tempat_lahir }}
                                                    </th>
                                                    <th>
                                                        {{ $d->tanggal_lahir->format('d-m-Y') }}
                                                    </th>
                                                    <th>
                                                        {{ $d->alamat }}
                                                    </th>
                                                    <th>
                                                        {{ $d->jurusan }}
                                                    </th>
                                                    <td>
                                                        <form action="{{ route('mahasiswa.destroy', $d->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="{{ route('mahasiswa.edit', $d->id) }}"
                                                                class="btn btn-success btn-sm">Edit</a>
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                name="button" onclick="return confirm('Apakah anda akan menghapus data mahasiswa ini?');">Delete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>

                                </table>

                            </div>
                        </div>
                        <div class="card-footer">
                            <div aria-label="Page navigation example">
                                <ul class="pagination">
                                    {!! $posts->links() !!}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
