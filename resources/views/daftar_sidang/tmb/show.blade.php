@extends('layouts.master')

@section('content')

<section class="content-header">
    <h3>Data Sidang Skripsi</h3>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-4">
            <div class="box box-warning">
                <div class="box-header with-border">
                    <h3 class="box-title">Informasi Sidang Skripsi</h3>
                </div>
                <div class="box-body box-profile">
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
                        <li class="list-group-item">
                            <p>Status</p>
                            @if($data->status == 0)
                            <span class="label bg-yellow">Menunggu</span>
                            @elseif($data->status == 1)
                            <span class="label bg-green">Diterima</span>
                            @elseif($data->status == 2)
                            <span class="label bg-red">Ditolak</span>
                            @endif
                        </li>
                        <li class="list-group-item">
                            <p>Keterangan</p>
                            @if ($data->keterangan != '')
                            <b>{{ $data->keterangan }}</b>
                            @else
                            <b>-</b>
                            @endif
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
                                <th>Status</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td><a href="{{ url('/mahasiswa/sidang/syarat01', $data->syarat_1) }}" target="_blank">Transkrip Nilai</a></td>
                                <td>
                                    @if($data->status_1 == '')
                                    -
                                    @elseif($data->status_1 == 1)
                                    <span class="label bg-green">Diterima</span>
                                    @elseif($data->status_1 == 2)
                                    <span class="label bg-red">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($data->keterangan_1 != '')
                                    <p>{{ $data->keterangan_1 }}</p>
                                    @else
                                    <p>-</p>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td><a href="{{ url('/mahasiswa/sidang/syarat02', $data->syarat_2) }}" target="_blank">Sertifikat Pesantren Calon Sarjana</a></td>
                                <td>
                                    @if($data->status_2 == '')
                                    -
                                    @elseif($data->status_2 == 1)
                                    <span class="label bg-green">Diterima</span>
                                    @elseif($data->status_2 == 2)
                                    <span class="label bg-red">Ditolak</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($data->keterangan_2 != '')
                                    <p>{{ $data->keterangan_2 }}</p>
                                    @else
                                    <p>-</p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <a href="{{ route('sidang_tmb.index') }}" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</section>

@endsection