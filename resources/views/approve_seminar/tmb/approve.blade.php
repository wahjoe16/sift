@extends('layouts.master')

@section('content')

<section class="content-header">
    <h3>Approval Kolokium Skripsi</h3>
</section>

<section class="content">
    @includeIf('layouts.alert')
    <form action="{{ route('approve-seminarTmb.store', $data->id) }}" class="form-horizontal" method="post">@csrf
        <div class="row">
            <div class="col-md-4">
                <div class="box box-warning">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Kolokium Skripsi</h3>
                    </div>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ asset('/user/foto/' . $data->mahasiswa->foto) }}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{ $data->mahasiswa->nama }}</h3>
                        <p class="text-muted text-center">{{ $data->mahasiswa->nik }}</p>
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <p>Tahun Ajaran</p>
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
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat01', $data->syarat_1) }}" target="_blank">Bukti pembayaran Kolokium Skripsi</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat02', $data->syarat_2) }}" target="_blank">Sertifikat TOEFL</a></td>
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
                                <tr>
                                    <td>3</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat03', $data->syarat_3) }}" target="_blank">Formulir nilai bimbingan skripsi</a></td>
                                    <td>
                                        <select name="status_3" id="status_3" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_3" id="keterangan_3" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat04', $data->syarat_4) }}" target="_blank">Formulir kemajuan bimbingan skripsi</a></td>
                                    <td>
                                        <select name="status_4" id="status_4" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_4" id="keterangan_4" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat05', $data->syarat_5) }}" target="_blank">Formulir persetujuan kolokium skripsi</a></td>
                                    <td>
                                        <select name="status_5" id="status_5" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_5" id="keterangan_5" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat06', $data->syarat_6) }}" target="_blank">Formulir kesediaan menghadiri kolokium skripsi</a></td>
                                    <td>
                                        <select name="status_6" id="status_6" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_6" id="keterangan_6" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat07', $data->syarat_7) }}" target="_blank">Pas foto ukuran 4 x 6 sebanyak 2 lembar</a></td>
                                    <td>
                                        <select name="status_7" id="status_7" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_7" id="keterangan_7" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat08', $data->syarat_8) }}" target="_blank">Kartu Tanda Mahasiswa</a></td>
                                    <td>
                                        <select name="status_8" id="status_8" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_8" id="keterangan_8" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>9</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat09', $data->syarat_9) }}" target="_blank">Bukti pembayaran kuliah</a></td>
                                    <td>
                                        <select name="status_9" id="status_9" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_9" id="keterangan_9" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat10', $data->syarat_10) }}" target="_blank">Bukti perwalian</a></td>
                                    <td>
                                        <select name="status_10" id="status_10" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_10" id="keterangan_10" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>11</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat11', $data->syarat_11) }}" target="_blank">Bukti bebas pinjaman perpustakaan</a></td>
                                    <td>
                                        <select name="status_11" id="status_11" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_11" id="keterangan_11" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>12</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat12', $data->syarat_12) }}" target="_blank">Keterangan menghadiri kolokium skripsi (7 kali)</a></td>
                                    <td>
                                        <select name="status_12" id="status_12" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_12" id="keterangan_12" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>13</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat13', $data->syarat_13) }}" target="_blank">Draft skripsi (PDF)</a></td>
                                    <td>
                                        <select name="status_13" id="status_13" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_13" id="keterangan_13" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat14', $data->syarat_14) }}" target="_blank">Draft skripsi (DOCX)</a></td>
                                    <td>
                                        <select name="status_14" id="status_14" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_14" id="keterangan_14" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>15</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat15', $data->syarat_15) }}" target="_blank">Sertifikat SKKFT</a></td>
                                    <td>
                                        <select name="status_15" id="status_15" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_15" id="keterangan_15" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>16</td>
                                    <td><a href="{{ url('/mahasiswa/seminar/syarat16', $data->syarat_16) }}" target="_blank">Bukti pembayaran Kolokium Skripsi</a></td>
                                    <td>
                                        <select name="status_16" id="status_16" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_16" id="keterangan_16" cols="30" rows="1" class="form-control"></textarea>
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
                                <a href="{{ route('view-seminarTmb.index') }}" class="btn btn-light">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection