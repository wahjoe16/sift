<?php

namespace App\Http\Controllers;

use App\Models\DaftarSeminar;
use App\Models\Semester;
use App\Models\TahunAjaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DaftarSeminarController extends Controller
{
    public function indexTmb()
    {
        $dataMhs = auth()->user();
        dd($dataMhs);

        return view('daftar_seminar.tmb.index');
    }

    public function indexTi()
    {
        $dataMhs = auth()->user();
        $dataSeminar = DaftarSeminar::where('mahasiswa_id', $dataMhs->id)->get();

        return view('daftar_seminar.ti.index', compact('dataSeminar'));
    }

    public function daftarTi()
    {
        $title = "Pengajuan Seminar Tugas Akhir";
        Session::put('page', 'daftar_seminar_ti');
        $dosen1 = User::where([
            'level' => 2,
            'program_studi' => 'Teknik Industri'
        ])->get();
        $dosen2 = User::where('level', 2)->get();
        $tahun_ajaran = TahunAjaran::get();
        $semester = Semester::get();

        return view('daftar_seminar.ti.create', compact('title', 'semester', 'tahun_ajaran', 'dosen1', 'dosen2'));
    }

    public function storeTi(Request $request)
    {

        $mhs = auth()->user();
        $npm = $mhs->nik;

        if ($request->isMethod('POST')) {
            $data = $request->all();

            $rules = [
                'tahun_ajaran_id' => 'required',
                'semester_id' => 'required',
                'dosen1_id' => 'required',
                'dosen2_id' => 'required',
                'judul_skripsi' => 'required',
                // 'tanggal_pengajuan' => 'required|date_format:m/d/Y',
                'syarat_1' => 'required|mimes:pdf',
                'syarat_2' => 'required|mimes:pdf',
                'syarat_3' => 'required|mimes:pdf',
                'syarat_4' => 'required|mimes:pdf',
                'syarat_5' => 'required|mimes:pdf',
                'syarat_6' => 'required|mimes:pdf',
                'syarat_7' => 'required|mimes:pdf',
                'syarat_8' => 'required|mimes:pdf',
                'syarat_9' => 'required|mimes:pdf',
                'syarat_10' => 'required|mimes:pdf',

            ];

            $customMessage = [
                'tahun_ajaran_id.required' => 'Tahun Ajaran Tidak Boleh Kosong',
                'dosen1_id.required' => 'Dosen Pembimbing 1 Tidak Boleh Kosong',
                'dosen2_id.required' => 'Dosen Pembimbing 2 Tidak Boleh Kosong',
                'judul_skripsi.required' => 'Judul Skripsi Tidak Boleh Kosong',
                // 'tanggal_pengajuan.required' => 'Tanggal Pengajuan Tidak Boleh Kosong',
                // 'tanggal_pengajuan.date_format' => 'Format Tanggal Pengajuan Harus Benar',
                'syarat_1.required' => 'Formulir pendaftaran Seminar terisi Harus Diisi',
                'syarat_2.required' => 'Copy Berita Acara Pembimbingan / Kartu Bimbingan Harus Diisi',
                'syarat_3.required' => 'Persetujuan Seminar dari Dosen Pembimbing Harus Diisi',
                'syarat_4.required' => 'Fotocopy Kwitansi Pembayaran Seminar dan Bimbingan Tugas Akhir Harus Diisi',
                'syarat_5.required' => 'Transkrip Nilai terakhir yang sudah lulus MK Semester 1-6 dan KP Harus Diisi',
                'syarat_6.required' => 'Form Bebas Tunggakan / Pinjaman Harus Diisi',
                'syarat_7.required' => 'Print out bukti pengecekan Plagiarisme <= 25% Harus Diisi',
                'syarat_8.required' => 'Bukti Monitoring Hafalan Harus Diisi',
                'syarat_9.required' => 'Sertifikat SKKFT Harus Diisi',
                'syarat_10.required' => 'Surat Penunjukan Pembimbing Harus Diisi',
                'syarat_1.mimes' => 'Format File Formulir pendaftaran Seminar terisi Harus PDF',
                'syarat_2.mimes' => 'Format File Copy Berita Acara Pembimbingan / Kartu Bimbingan Harus PDF',
                'syarat_3.mimes' => 'Format File Persetujuan Seminar dari Dosen Pembimbing Harus PDF',
                'syarat_4.mimes' => 'Format File Fotocopy Kwitansi Pembayaran Seminar dan Bimbingan Tugas Akhir Harus PDF',
                'syarat_5.mimes' => 'Format File Transkrip Nilai terakhir yang sudah lulus MK Semester 1-6 dan KP Harus PDF',
                'syarat_6.mimes' => 'Format File Form Bebas Tunggakan / Pinjaman Harus PDF',
                'syarat_7.mimes' => 'Format File Print out bukti pengecekan Plagiarisme <= 25% Harus PDF',
                'syarat_8.mimes' => 'Format File Bukti Monitoring Hafalan Harus PDF',
                'syarat_9.mimes' => 'Format File Sertifikat SKKFT Harus PDF',
                'syarat_10.mimes' => 'Format File Surat Penunjukan Pembimbing Harus PDF',

            ];

            $this->validate($request, $rules, $customMessage);

            $daftarSeminar = new DaftarSeminar();
            $daftarSeminar->mahasiswa_id = auth()->user()->id;
            $daftarSeminar->program_studi_id = auth()->user()->program_studi;
            $daftarSeminar->tahun_ajaran_id = $request['tahun_ajaran_id'];
            $daftarSeminar->semester_id = $request['semester_id'];
            $daftarSeminar->dosen1_id = $request['dosen1_id'];
            $daftarSeminar->dosen2_id = $request['dosen2_id'];
            $daftarSeminar->judul_skripsi = $request['judul_skripsi'];
            // $daftarSeminar->tanggal_pengajuan = date('Y-m-d', strtotime($request['tanggal_pengajuan']));

            // upload syarat 
            $syarat_1 = $request->file('syarat_1');
            $ext_syarat_1 = $syarat_1->getClientOriginalExtension();
            $nama_syarat_1 = $npm . "_" . $syarat_1->getClientOriginalName() . "." . $ext_syarat_1;
            $syarat_1_path = 'mahasiswa/seminar/syarat01';
            $syarat_1->move($syarat_1_path, $nama_syarat_1);
            $daftarSeminar->syarat_1 = $nama_syarat_1;

            // upload syarat 2
            $syarat_2 = $request->file('syarat_2');
            $ext_syarat_2 = $syarat_2->getClientOriginalExtension();
            $nama_syarat_2 = $npm . "_" . $syarat_2->getClientOriginalName() . "." . $ext_syarat_2;
            $syarat_2_path = 'mahasiswa/seminar/syarat02';
            $syarat_2->move($syarat_2_path, $nama_syarat_2);
            $daftarSeminar->syarat_2 = $nama_syarat_2;

            // upload syarat 3
            $syarat_3 = $request->file('syarat_3');
            $ext_syarat_3 = $syarat_3->getClientOriginalExtension();
            $nama_syarat_3 = $npm . "_" . $syarat_3->getClientOriginalName() . "." . $ext_syarat_3;
            $syarat_3_path = 'mahasiswa/seminar/syarat03';
            $syarat_3->move($syarat_3_path, $nama_syarat_3);
            $daftarSeminar->syarat_3 = $nama_syarat_3;

            // upload syarat 
            $syarat_4 = $request->file('syarat_4');
            $ext_syarat_4 = $syarat_4->getClientOriginalExtension();
            $nama_syarat_4 = $npm . "_" . $syarat_4->getClientOriginalName() . "." . $ext_syarat_4;
            $syarat_4_path = 'mahasiswa/seminar/syarat04';
            $syarat_4->move($syarat_4_path, $nama_syarat_4);
            $daftarSeminar->syarat_4 = $nama_syarat_4;

            // upload syarat 
            $syarat_5 = $request->file('syarat_5');
            $ext_syarat_5 = $syarat_5->getClientOriginalExtension();
            $nama_syarat_5 = $npm . "_" . $syarat_5->getClientOriginalName() . "." . $ext_syarat_5;
            $syarat_5_path = 'mahasiswa/seminar/syarat05';
            $syarat_5->move($syarat_5_path, $nama_syarat_5);
            $daftarSeminar->syarat_5 = $nama_syarat_5;

            // upload syarat 
            $syarat_6 = $request->file('syarat_6');
            $ext_syarat_6 = $syarat_6->getClientOriginalExtension();
            $nama_syarat_6 = $npm . "_" . $syarat_6->getClientOriginalName() . "." . $ext_syarat_6;
            $syarat_6_path = 'mahasiswa/seminar/syarat06';
            $syarat_6->move($syarat_6_path, $nama_syarat_6);
            $daftarSeminar->syarat_6 = $nama_syarat_6;

            // upload syarat 
            $syarat_7 = $request->file('syarat_7');
            $ext_syarat_7 = $syarat_7->getClientOriginalExtension();
            $nama_syarat_7 = $npm . "_" . $syarat_7->getClientOriginalName() . "." . $ext_syarat_7;
            $syarat_7_path = 'mahasiswa/seminar/syarat07';
            $syarat_7->move($syarat_7_path, $nama_syarat_7);
            $daftarSeminar->syarat_7 = $nama_syarat_7;

            // upload syarat 
            $syarat_8 = $request->file('syarat_8');
            $ext_syarat_8 = $syarat_8->getClientOriginalExtension();
            $nama_syarat_8 = $npm . "_" . $syarat_8->getClientOriginalName() . "." . $ext_syarat_8;
            $syarat_8_path = 'mahasiswa/seminar/syarat08';
            $syarat_8->move($syarat_8_path, $nama_syarat_8);
            $daftarSeminar->syarat_8 = $nama_syarat_8;

            // upload syarat 
            $syarat_9 = $request->file('syarat_9');
            $ext_syarat_9 = $syarat_9->getClientOriginalExtension();
            $nama_syarat_9 = $npm . "_" . $syarat_9->getClientOriginalName() . "." . $ext_syarat_9;
            $syarat_9_path = 'mahasiswa/seminar/syarat09';
            $syarat_9->move($syarat_9_path, $nama_syarat_9);
            $daftarSeminar->syarat_9 = $nama_syarat_8;

            // upload syarat 
            $syarat_10 = $request->file('syarat_10');
            $ext_syarat_10 = $syarat_10->getClientOriginalExtension();
            $nama_syarat_10 = $npm . "_" . $syarat_10->getClientOriginalName() . "." . $ext_syarat_10;
            $syarat_10_path = 'mahasiswa/seminar/syarat10';
            $syarat_10->move($syarat_10_path, $nama_syarat_10);
            $daftarSeminar->syarat_10 = $nama_syarat_10;



            $daftarSeminar->save();

            return redirect()->back()->with('success_message', 'Sukses mengajukan pendaftaran sidang');
        }
    }

    public function indexPwk()
    {
    }
}
