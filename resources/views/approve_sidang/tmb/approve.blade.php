@extends('layouts.master')

@section('content')

<section class="content-header">
    <h3>Approval Sidang Skripsi</h3>
</section>

<section class="content">
    @includeIf('layouts.alert')
    <form action="{{ route('approve-sidangTmb.store', $data->id) }}" class="form-horizontal" method="post">@csrf
        <div class="row">
            <div class="col-md-4">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Sidang Skripsi</h3>
                    </div>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('/user/foto/' . $data->mahasiswa->foto) }}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{ $data->mahasiswa->nama }}</h3>
                        <p class="text-muted text-center">{{ $data->mahasiswa->nik }}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <p>Tahun Akademik</p>
                                <b>{{ $data->tahun_ajaran->tahun_ajaran }}</b>
                            </li>
                            <li class="list-group-item">
                                <p>Semester</p>
                                <b>{{ $data->semester->semester }}</b>
                            </li>
                            <li class="list-group-item">
                                <p>Dosen Pembimbing 1</p>
                                <b>{{ $data->dosen_1->nama }}</b>
                            </li>
                            <li class="list-group-item">
                                <p>Dosen Pembimbing 2</p>
                                <b>{{ $data->dosen_2->nama }}</b>
                            </li>
                            <li class="list-group-item">
                                <p>Judul Skripsi</p>
                                <b>{{ $data->judul_skripsi }}</b>
                            </li>
                            <li class="list-group-item">
                                <p>Tanggal Pengajuan</p>
                                <b>{{ tanggal_indonesia($data->created_at) }}</b>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dokumen Persyaratan</h3>
                    </div>
                    <div class="box-body no-padding">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Dokumen</th>
                                    <th>Approve</th>
                                    <th>Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat01', $data->syarat_1) }}" target="_blank">Transkrip Nilai</a></td>
                                    <td>
                                        <select name="status_1" id="status_1" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_1" id="keterangan_1" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat02', $data->syarat_2) }}" target="_blank">Sertifikat Pesantren Calon Sarjana</a></td>
                                    <td>
                                        <select name="status_2" id="status_2" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_2" id="keterangan_2" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Status Approval</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 col-form-label">Approval</label>
                            <div class="col-sm-10">
                                <select class="form-control @error('status') is-invalid @enderror select2 dynamic" style="width: 100%;" name="status" id="status">
                                    <option value="" disabled selected>Pilih</option>
                                    <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                    <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                </select>
                                @error('status') <span class="text-red">{{$message}}</span> @enderror
                            </div>
                        </div><br>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-10">
                                <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" rows="3" placeholder="Masukan Keterangan"></textarea>
                                @error('keterangan') <span class="text-red">{{$message}}</span> @enderror
                            </div>
                        </div><br>
                        <div class="form-group">
                            <div class="col-sm-2">

                            </div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                <a href="{{ route('view-sidangTmb.index') }}" class="btn btn-light">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection