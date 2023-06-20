@extends('layouts.master')

@section('content')

<section class="content-header">
    <h3>Approval Sidang Tugas Akhir</h3>
</section>

<section class="content">
    @includeIf('layouts.alert')
    <form action="{{ route('approve-sidangTi.store', $data->id) }}" class="form-horizontal" method="post">@csrf
        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informasi Sidang Tugas Akhir</h3>
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
                <div class="box box-primary">
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat01', $data->syarat_1) }}" target="_blank">Formulir Biodata Alumni</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat02', $data->syarat_2) }}" target="_blank">Formulir Pembuatan Ijazah</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat03', $data->syarat_3) }}" target="_blank">Fotocopy Kwitansi DPP/UKT</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat04', $data->syarat_4) }}" target="_blank">Fotocopy Kwitansi Bimbingan TA</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat05', $data->syarat_5) }}" target="_blank">Fotocopy Kwitansi Sidang TA</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat06', $data->syarat_6) }}" target="_blank">Fotocopy Kwitansi Seminar TA</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat07', $data->syarat_7) }}" target="_blank">Fotocopy Sertifikat Pesantren Calon Sarjana</a>
                                    </td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat08', $data->syarat_8) }}" target="_blank">Formulir Rencana Studi (FRS)</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat09', $data->syarat_9) }}" target="_blank">Bukti Penyerahan Draft TA (4 Eksemplar)</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat10', $data->syarat_10) }}" target="_blank">Bukti Bebas Perpustakaan Pusat UNISBA</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat11', $data->syarat_11) }}" target="_blank">Bukti Bebas Perpustakaan TI</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat12', $data->syarat_12) }}" target="_blank">Transkrip Nilai Terakhir</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat13', $data->syarat_13) }}" target="_blank">Persetujuan Sidang dari Dosen Pembimbing (Kartu Bimbingan Asli)</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat14', $data->syarat_14) }}" target="_blank">Fotocopy Sertifikat TOEFL</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat15', $data->syarat_15) }}" target="_blank">Fotocopy Sertifikat PPMB</a></td>
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
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat16', $data->syarat_16) }}" target="_blank">Bebas Pinjaman / Tunggakan</a></td>
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
                                <tr>
                                    <td>17</td>
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat17', $data->syarat_17) }}" target="_blank">Menghadiri Seminar / Sidang minimal 3 kali</a>
                                    </td>
                                    <td>
                                        <select name="status_17" id="status_17" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_17" id="keterangan_17" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>18</td>
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat18', $data->syarat_18) }}" target="_blank">Fotocopy Sertifikat Academic Writing and Conversation</a></td>
                                    <td>
                                        <select name="status_18" id="status_18" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_18" id="keterangan_18" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>19</td>
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat19', $data->syarat_19) }}" target="_blank">Form Hafalan Surat Al-Quran (minimal 25 surat)</a></td>
                                    <td>
                                        <select name="status_19" id="status_19" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_19" id="keterangan_19" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td>20</td>
                                    <td><a href="{{ url('/mahasiswa/sidang/syarat20', $data->syarat_20) }}" target="_blank">Print out bukti pengecekan Plagiarisme < 25% (sebelum sidang)</a>
                                    </td>
                                    <td>
                                        <select name="status_20" id="status_20" class="form-control">
                                            <option value="" disabled selected>Pilih</option>
                                            <option value="2" @if($data->status==2) selected @endif>Ditolak</option>
                                            <option value="1" @if($data->status==1) selected @endif>Diterima</option>
                                        </select>
                                    </td>
                                    <td>
                                        <textarea name="keterangan_20" id="keterangan_20" cols="30" rows="1" class="form-control"></textarea>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="box box-primary">
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
                                <a href="{{ route('view-sidangTi.index') }}" class="btn btn-light">Batal</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>

@endsection