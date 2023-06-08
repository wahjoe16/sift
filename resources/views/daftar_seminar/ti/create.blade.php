@extends('layouts.master')

@section('content')

<section class="content">
    @includeIf('layouts.alert')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ $title }}</h3>
                </div>

                <form class="form-sample" action="{{ route('seminar_ti.store') }}" method="post" enctype="multipart/form-data">@csrf
                    <div class="box-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="box">
                                    <div class="box-body">
                                        <p class="box-description">Informasi Seminar Tugas Akhir Teknik Industri</p>
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label" for="tahun_ajaran_id">Tahun Ajaran</label>
                                                    <div class="col-sm-8">
                                                        <select name="tahun_ajaran_id" id="tahun_ajaran_id" class="form-control js-example-basic-single w-100">
                                                            <option value="">Pilih</option>
                                                            @foreach($tahun_ajaran as $ta)
                                                            <option value="{{ $ta['id'] }}">{{ $ta['tahun_ajaran'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label" for="semester_id">Semester</label>
                                                    <div class="col-sm-8">
                                                        <select name="semester_id" id="semester_id" class="form-control js-example-basic-single w-100">
                                                            <option value="">Pilih</option>
                                                            @foreach($semester as $s)
                                                            <option value="{{ $s['id'] }}">{{ $s['semester'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputEmail2" class="col-sm-4 col-form-label" for="dosen1_id">Dosen Pembimbing 1</label>
                                                    <div class="col-sm-8">
                                                        <select name="dosen1_id" id="dosen1_id" class="form-control js-example-basic-single w-100">
                                                            <option value="">Pilih</option>
                                                            @foreach($dosen1 as $d)
                                                            <option value="{{ $d['id'] }}">{{ $d['nama'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="exampleInputEmail2" class="col-sm-4 col-form-label" for="dosen2_id">Dosen Pembimbing 2</label>
                                                    <div class="col-sm-8">
                                                        <select name="dosen2_id" id="dosen2_id" class="form-control js-example-basic-single w-100">
                                                            <option value="">Pilih</option>
                                                            @foreach($dosen2 as $d)
                                                            <option value="{{ $d['id'] }}">{{ $d['nama'] }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-sm-12">
                                                <div class="form-group row">
                                                    <label class="col-sm-4 col-form-label" for="judul_skripsi">Judul Skripsi</label>
                                                    <div class="col-sm-8">
                                                        <textarea name="judul_skripsi" class="form-control" id="" cols="30" rows="10"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p class="card-description">Upload Persyaratan</p>
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="file" name="syarat_1" class="dropify" id="syarat_1">
                                                        <p for="exampleInputEmail2" class="col-form-label text-center" for="syarat_1">Formulir pendaftaran Seminar terisi</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="file" name="syarat_2" class="dropify" id="syarat_2">
                                                        <p for="exampleInputEmail2" class="col-form-label text-center" for="syarat_2">Copy Berita Acara Pembimbingan / Kartu Bimbingan</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="file" name="syarat_3" class="dropify" id="syarat_3">
                                                        <p for="exampleInputEmail2" class="col-form-label text-center" for="syarat_3">Persetujuan Seminar dari Dosen Pembimbing</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="file" name="syarat_4" class="dropify" id="syarat_4">
                                                        <p for="exampleInputEmail2" class="col-form-label text-center" for="syarat_4">Fotocopy Kwitansi Pembayaran Seminar dan Bimbingan Tugas Akhir</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="file" name="syarat_5" class="dropify" id="syarat_5">
                                                        <p for="exampleInputEmail2" class="col-form-label text-center" for="syarat_5">Transkrip Nilai terakhir yang sudah lulus MK Semester 1-6 dan KP</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="file" name="syarat_6" class="dropify" id="syarat_6">
                                                        <p for="exampleInputEmail2" class="col-form-label text-center" for="syarat_6">Form Bebas Tunggakan / Pinjaman</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="file" name="syarat_7" class="dropify" id="syarat_7">
                                                        <p for="exampleInputEmail2" class="col-form-label text-center" for="syarat_7">Print out bukti pengecekan Plagiarisme <= 25%</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="file" name="syarat_8" class="dropify" id="syarat_8">
                                                        <p for="exampleInputEmail2" class="col-form-label text-center" for="syarat_8">Bukti Monitoring Hafalan</p>
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-sm-6">
                                                        <input type="file" name="syarat_9" class="dropify" id="syarat_9">
                                                        <p for="exampleInputEmail2" class="col-form-label text-center" for="syarat_9">Sertifikat SKKFT</p>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <input type="file" name="syarat_10" class="dropify" id="syarat_10">
                                                        <p for="exampleInputEmail2" class="col-form-label text-center" for="syarat_10">Surat Penunjukan Pembimbing</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div><br><br>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group row">
                                    <div class="col-sm-3">
                                        <button type="submit" class="btn btn-primary mr-2">Simpan</button>
                                        <a href="{{ route('seminar_ti.index') }}" class="btn btn-light">Batal</a>
                                    </div>
                                    <div class="col-sm-9">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts_page')
<script src="{{ url('admin/vendors/select2/select2.min.js') }}"></script>
<script src="{{ url('admin/js/select2.js') }}"></script>
<script>
    $('.dropify').dropify();
    $('#datepicker-popup').datepicker();
</script>

@endpush