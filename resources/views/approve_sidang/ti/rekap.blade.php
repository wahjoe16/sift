@extends('layouts.master')

@section('content')

<section class="content">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3>Data Sidang Tugas Akhir</h3>
                </div>
                <div class="box-body table-responsive">
                    <table class="table table-striped table-bordered table-rekap-sidang">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NPM</th>
                                <th>Nama</th>
                                <th>Tahun Akademik</th>
                                <th>Semester</th>
                                <th>Tanggal Pengajuan</th>
                                <th width="15%"><i class="fa fa-cogs"></i> Aksi</th>
                            </tr>
                        </thead>
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
    let table;

    $(function() {
        table = $('.table-rekap-sidang').DataTable({
            processing: true,
            autoWidth: false,
            ajax: {
                url: "{{ route('rekap-sidangrTi.data') }}"
            },
            columns: [{
                    data: 'DT_RowIndex',
                    'searchable': false,
                    'sortable': false
                },
                {
                    data: 'nik'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'tahun_ajaran'
                },
                {
                    data: 'semester'
                },
                {
                    data: 'tanggal_pengajuan'
                },
                {
                    data: 'aksi'
                }
            ]
        })
    })
</script>
@endpush