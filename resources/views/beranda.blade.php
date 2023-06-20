@extends('layouts.firstpage')

@section('content')

<section class="content">
    <!-- @includeIf('layouts.alert') -->
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{ route('dashboard.sidang') }}" class="text-black">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-graduation-cap"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Dokumentasi Persyaratan</span>
                        <span class="info-box-number">Sidang</span>
                    </div>
                </div>
            </a>
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
        @if (auth()->user()->level == 1)
        <div class="col-md-4 col-sm-6 col-xs-12">
            <a href="{{ route('dashboard.datamaster') }}" class="text-black">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="fa fa-book"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Data</span>
                        <span class="info-box-number">Master</span>
                    </div>
                </div>
            </a>
        </div>
        @endif
    </div>
</section>

@endsection