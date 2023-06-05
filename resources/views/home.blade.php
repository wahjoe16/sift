@extends('layouts.dashboard')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-graduation-cap"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Dokumentasi Persyaratan</span>
                    <span class="info-box-number">Sidang</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-copy"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Arsip</span>
                    <span class="info-box-number">Fakultas</span>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Kegiatan</span>
                    <span class="info-box-number">Kemahasiswaan</span>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection