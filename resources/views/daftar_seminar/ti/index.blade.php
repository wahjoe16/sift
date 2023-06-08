@extends('layouts.master')

@section('content')

<section class="content">
    @includeIf('layouts.alert')
    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <div class="btn-group">
                        <a href="{{ route('seminar_ti.daftar') }}" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-upload"></i> Ajukan</a>
                    </div>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-striped table-bordered table-seminar">
                        <thead>
                            <th>Tahun Ajaran</th>
                            <th>Semester</th>
                            <th>Dosen Pembimbing 1</th>
                            <th>Dosen Pembimbing 2</th>
                            <th>Status</th>
                            <th width="15%"><i class="fa fa-cogs"></i></th>
                        </thead>
                        <tbody>
                            @foreach ($dataSeminar as $d)
                            <td>{{ $d->tahun_ajaran->tahun_ajaran }}</td>
                            <td>{{ $d->semester->semester }}</td>
                            <td>{{ $d->dosen_1->nama }}</td>
                            <td>{{ $d->dosen_2->nama }}</td>

                            @if ($d->status == 0)
                            <td><span class="badge badge-warning">Menunggu</span></td>
                            @elseif ($d->status == 1)
                            <td><span class="badge badge-success">Diterima</span></td>
                            @elseif ($d->status == 2)
                            <td><span class="badge badge-danger">Ditolak</span></td>
                            @endif

                            <td><a href="{{ route('seminar_ti.show') }}"><i class="fa fa-search"></i></a></td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@includeIf('mahasiswa.form')

@endsection

@push('scripts_page')
<script>

</script>
@endpush