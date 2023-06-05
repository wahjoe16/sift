@extends('layouts.dashboard')

@section('content')

@if(Session::has('error_message'))
<div class="alert alert-danger alert-dismissible fade show">
    <strong>Error: </strong>{{ Session::get('error_message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(Session::has('success_message'))
<div class="alert alert-success alert-dismissible fade show">
    <strong>Sukses: </strong>{{ Session::get('success_message') }}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    @foreach($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<section class="content">
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12">
            <div class="box">
                <div class="box-body box-profile">
                    @if(!empty(auth()->user()->foto))
                    <img class="profile-user-img img-responsive img-circle" src="{{ url(auth()->user()->foto ?? '') }}" alt="">
                    @else
                    <img class="profile-user-img img-responsive img-circle" src="{{ asset('user/foto/user.png') }}" alt="" style="width: 300px important;">
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-8 col-sm-6 col-xs-12">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <h3 class="box-title">Update Profile</h3>
                </div>
                <div class="box-body">
                    <form class="form-horizontal" action="{{ route('update-profil') }}" method="post" enctype="multipart/form-data">@csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="nik" class="col-sm-2 control-label">NIK / NPM</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nik" id="nik" placeholder="Email" value="{{ auth()->user()->nik }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nama" class="col-sm-2 control-label">Nama</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama" value="{{ auth()->user()->nama }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="superadmin" class="col-sm-2 control-label">Tipe User</label>

                                <div class="col-sm-10">
                                    <select name="level" id="level" class="form-control" required>
                                        <option value="">Select</option>
                                        @foreach ([
                                        "1"=>"Admin",
                                        "2"=>"Dosen",
                                        "3"=>"Mahasiswa",
                                        ] as $level => $levelLabel )
                                        <option value="{{ $level }}" {{ old("level", auth()->user()->level)==$level ? "selected" : "" }}>{{ $levelLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            @if (auth()->user()->level == 2 && 3)
                            <div class="form-group">
                                <label for="program_studi" class="col-sm-2 control-label">Program Studi</label>

                                <div class="col-sm-10">
                                    <select name="program_studi" id="program_studi" class="form-control text-dark" required>
                                        <option value="">Select</option>
                                        @foreach ([
                                        "Teknik Pertambangan"=>"Teknik Pertambangan",
                                        "Perencanaan Wilayah dan Kota"=>"Perencanaan Wilayah dan Kota",
                                        "Teknik Industri"=>"Teknik Industri"
                                        ] as $programStudi => $prodiLabel)
                                        <option value="{{ $programStudi }}" {{ old("program_studi", auth()->user()->program_studi)==$programStudi ? "selected" : "" }}>{{ $prodiLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif

                            @if (auth()->user()->level == 2)
                            <div class="form-group">
                                <label for="tipe_dosen" class="col-sm-2 control-label">Tipe Dosen</label>

                                <div class="col-sm-10">
                                    <select name="tipe_dosen" id="tipe_dosen" class="form-control text-dark" required>
                                        <option value="">Select</option>
                                        @foreach ([
                                        "internal"=>"Internal",
                                        "external"=>"External"
                                        ] as $tipeDosen => $tipeDosenLabel)
                                        <option value="{{ $tipeDosen }}" {{ old("tipe_dosen", auth()->user()->tipe_dosen)==$tipeDosen ? "selected" : "" }}>{{ $tipeDosenLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status_dekanat" class="col-sm-2 control-label">Status Dekanat</label>

                                <div class="col-sm-10">
                                    <select name="status_dekanat" id="status_dekanat" class="form-control" disabled>
                                        <option value="">Select</option>
                                        @foreach ([
                                        "0"=>"Tidak",
                                        "1"=>"Ya",
                                        ] as $status_dekanat => $status_dekanatLabel )
                                        <option value="{{ $status_dekanat }}" {{ old("status_dekanat", auth()->user()->status_dekanat)==$status_dekanat ? "selected" : "" }}>{{ $status_dekanatLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status_koordinator_skripsi" class="col-sm-2 control-label">Status Koordinator Skripsi</label>

                                <div class="col-sm-10">
                                    <select name="status_koordinator_skripsi" id="status_koordinator_skripsi" class="form-control" disabled>
                                        <option value="">Select</option>
                                        @foreach ([
                                        "0"=>"Tidak",
                                        "1"=>"Ya",
                                        ] as $status_koordinator_skripsi => $status_koordinator_skripsiLabel )
                                        <option value="{{ $status_koordinator_skripsi }}" {{ old("status_koordinator_skripsi", auth()->user()->status_koordinator_skripsi)==$status_koordinator_skripsi ? "selected" : "" }}>{{ $status_koordinator_skripsiLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status_kaprodi" class="col-sm-2 control-label">Status Ketua Program Studi</label>

                                <div class="col-sm-10">
                                    <select name="status_kaprodi" id="status_kaprodi" class="form-control" disabled>
                                        <option value="">Select</option>
                                        @foreach ([
                                        "0"=>"Tidak",
                                        "1"=>"Ya",
                                        ] as $status_kaprodi => $status_kaprodiLabel )
                                        <option value="{{ $status_kaprodi }}" {{ old("status_kaprodi", auth()->user()->status_kaprodi)==$status_kaprodi ? "selected" : "" }}>{{ $status_kaprodiLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="status_sekprodi" class="col-sm-2 control-label">Status Sekertaris Program Studi</label>

                                <div class="col-sm-10">
                                    <select name="status_sekprodi" id="status_sekprodi" class="form-control" disabled>
                                        <option value="">Select</option>
                                        @foreach ([
                                        "0"=>"Tidak",
                                        "1"=>"Ya",
                                        ] as $status_sekprodi => $status_sekprodiLabel )
                                        <option value="{{ $status_sekprodi }}" {{ old("status_sekprodi", auth()->user()->status_sekprodi)==$status_sekprodi ? "selected" : "" }}>{{ $status_sekprodiLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="telepon" class="col-sm-2 control-label">No Handphone</label>

                                <div class="col-sm-10">
                                    <input type="telepon" class="form-control" name="telepon" id="telepon" placeholder="telepon" value="{{ auth()->user()->telepon }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="superadmin" class="col-sm-2 control-label">Status Super Admin</label>

                                <div class="col-sm-10">
                                    <select name="superadmin" id="superadmin" class="form-control" disabled>
                                        <option value="">Superadmin</option>
                                        @foreach ([
                                        "0"=>"Tidak",
                                        "1"=>"Ya",
                                        ] as $superadmin => $superadminLabel )
                                        <option value="{{ $superadmin }}" {{ old("superadmin", auth()->user()->status_superadmin)==$superadmin ? "selected" : "" }}>{{ $superadminLabel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="foto" class="col-sm-2 control-label">Foto</label>

                                <div class="col-sm-10">
                                    <input type="file" name="foto" class="dropify" id="foto">
                                    @if(!empty(auth()->user()->foto))
                                    <a target="_blank" href="{{ url(auth()->user()->foto) }}">Lihat Foto</a>
                                    <input type="hidden" name="current_user_foto" value="{{ auth()->user()->foto }}">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-flat btn-success">Simpan</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-flat btn-danger">Batal</a>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('scripts_page')
<script>
    $('.dropify').dropify();
</script>
@endpush