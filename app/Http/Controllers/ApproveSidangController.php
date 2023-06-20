<?php

namespace App\Http\Controllers;

use App\Models\DaftarSidang;
use Illuminate\Http\Request;

class ApproveSidangController extends Controller
{
    public function viewTmb()
    {
        return view('approve_sidang.tmb.index');
    }

    public function dataTmb()
    {
        $data = DaftarSidang::select('daftar_sidang.*', 'users.nik', 'users.nama', 'tahun_ajaran.tahun_ajaran', 'semester.semester')
            ->leftJoin('users', 'users.id', 'daftar_sidang.mahasiswa_id')
            ->leftJoin('tahun_ajaran', 'tahun_ajaran.id', 'daftar_sidang.tahun_ajaran_id')
            ->leftJoin('semester', 'semester.id', 'daftar_sidang.semester_id')
            ->where([
                'program_studi_id' => 'Teknik Pertambangan',
                'status' => 0,
            ])->get();

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('tanggal_pengajuan', function ($data) {
                return tanggal_indonesia($data->created_at, false);
            })
            ->addColumn('approve', function ($data) {
                return '
                    <a href="' . route('approve-sidangTmb.store', $data->id) . '" class="btn btn-warning btn-xs btn-flat"><i class="fa fa-edit"></i></a>
                ';
            })
            ->rawColumns(['tanggal_pengajuan', 'approve'])
            ->make(true);
    }

    public function approveTmb(Request $request, $id)
    {
        $data = DaftarSidang::with('mahasiswa')->find($id);
        // dd($data);

        if ($request->isMethod('POST')) {
            $request->validate([
                'status' => 'required',
                'keterangan' => 'required_if:status,2',
                'keterangan_1' => 'required_if:status_1,2',
                'keterangan_2' => 'required_if:status_2,2',
            ], [
                'keterangan.required_if' => 'Keterangan harus diisi',
                'status.required' => 'Status approval harus diverifikasi',
                'keterangan_1.required_if' => 'Keterangan harus diisi',
                'keterangan_2.required_if' => 'Keterangan harus diisi',
            ]);

            $data->fill($request->input());
            $data->save();

            return redirect()->route('view-sidangTmb.index')->with('success', 'Pengajuan sidang skripsi berhasil diapprove');
        }
        return view('approve_sidang.tmb.approve', compact('data'));
    }

    public function rekapTmb()
    {
        return view('approve_sidang.tmb.rekap');
    }

    public function dataRekapTmb()
    {
        $data = DaftarSidang::select('daftar_seminar.*', 'users.nik', 'users.nama', 'tahun_ajaran.tahun_ajaran', 'semester.semester')
            ->leftJoin('users', 'users.id', 'daftar_seminar.mahasiswa_id')
            ->leftJoin('tahun_ajaran', 'tahun_ajaran.id', 'daftar_seminar.tahun_ajaran_id')
            ->leftJoin('semester', 'semester.id', 'daftar_seminar.semester_id')
            ->where([
                'program_studi_id' => 'Teknik Pertambangan',
                'status' => 1,
            ])->get();

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('tanggal_pengajuan', function ($data) {
                return tanggal_indonesia($data->created_at, false);
            })
            ->addColumn('aksi', function ($data) {
                return '
                    <a href="' . route('rekap-sidangTmb.show', $data->id) . '" class="btn btn-info btn-xs btn-flat"><i class="fa fa-search"></i></a>
                ';
            })
            ->rawColumns(['tanggal_pengajuan', 'aksi'])
            ->make(true);
    }

    public function showRekapTmb($id)
    {
        $data = DaftarSidang::find($id);
        return view('approve_seminar.tmb.show', compact('data'));
    }


    public function viewTi()
    {
        return view('approve_sidang.ti.index');
    }

    public function dataTi()
    {
        $data = DaftarSidang::select('daftar_sidang.*', 'users.nik', 'users.nama', 'tahun_ajaran.tahun_ajaran', 'semester.semester')
            ->leftJoin('users', 'users.id', 'daftar_sidang.mahasiswa_id')
            ->leftJoin('tahun_ajaran', 'tahun_ajaran.id', 'daftar_sidang.tahun_ajaran_id')
            ->leftJoin('semester', 'semester.id', 'daftar_sidang.semester_id')
            ->where([
                'program_studi_id' => 'Teknik Industri',
                'status' => 0,
            ])->get();

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('tanggal_pengajuan', function ($data) {
                return tanggal_indonesia($data->created_at, false);
            })
            ->addColumn('approve', function ($data) {
                return '
                    <a href="' . route('approve-sidangTi.store', $data->id) . '" class="btn btn-warning btn-xs btn-flat"><i class="fa fa-edit"></i></a>
                ';
            })
            ->rawColumns(['tanggal_pengajuan', 'approve'])
            ->make(true);
    }

    public function approveTi(Request $request, $id)
    {
        $data = DaftarSidang::with('mahasiswa')->find($id);
        // dd($data);

        if ($request->isMethod('POST')) {
            $request->validate([
                'status' => 'required',
                'keterangan' => 'required_if:status,2',
                'keterangan_1' => 'required_if:status_1,2',
                'keterangan_2' => 'required_if:status_2,2',
            ], [
                'keterangan.required_if' => 'Keterangan harus diisi',
                'status.required' => 'Status approval harus diverifikasi',
                'keterangan_1.required_if' => 'Keterangan harus diisi',
                'keterangan_2.required_if' => 'Keterangan harus diisi',
            ]);

            $data->fill($request->input());
            $data->save();

            return redirect()->route('view-sidangTi.index')->with('success', 'Pengajuan sidang skripsi berhasil diapprove');
        }
        return view('approve_sidang.ti.approve', compact('data'));
    }

    public function rekapTi()
    {
        return view('approve_sidang.ti.rekap');
    }

    public function dataRekapTi()
    {
        $data = DaftarSidang::select('daftar_seminar.*', 'users.nik', 'users.nama', 'tahun_ajaran.tahun_ajaran', 'semester.semester')
            ->leftJoin('users', 'users.id', 'daftar_seminar.mahasiswa_id')
            ->leftJoin('tahun_ajaran', 'tahun_ajaran.id', 'daftar_seminar.tahun_ajaran_id')
            ->leftJoin('semester', 'semester.id', 'daftar_seminar.semester_id')
            ->where([
                'program_studi_id' => 'Teknik Industri',
                'status' => 1,
            ])->get();

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->addColumn('tanggal_pengajuan', function ($data) {
                return tanggal_indonesia($data->created_at, false);
            })
            ->addColumn('aksi', function ($data) {
                return '
                    <a href="' . route('rekap-sidangTi.show', $data->id) . '" class="btn btn-info btn-xs btn-flat"><i class="fa fa-search"></i></a>
                ';
            })
            ->rawColumns(['tanggal_pengajuan', 'aksi'])
            ->make(true);
    }

    public function showRekapTi($id)
    {
        $data = DaftarSidang::find($id);
        return view('approve_seminar.ti.show', compact('data'));
    }
}
