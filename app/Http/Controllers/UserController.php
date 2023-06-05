<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile()
    {
        $data = auth()->user();
        return view('profile.index', compact('data'));
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->nama = $request->nama;
        $user->level = $request->level;
        $user->email = $request->email;
        $user->telepon = $request->telepon;
        $user->program_studi = $request->program_studi;
        $user->tipe_dosen = $request->tipe_dosen;
        $user->jabatan = $request->jabatan;

        // update foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $nama = 'user-' . date('Y-m-dHis') . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('user/foto'), $nama);

            $user->foto = "/user/foto/$nama";
        }

        $user->save();
        return redirect()->route('dashboard')->with('success_message', 'Sukses update profil');
    }

    public function password()
    {
        return view('profile.password');
    }

    public function updatePassword(Request $request)
    {
        $user = auth()->user();
        // update password
        if ($request->has('password') && $request->password != "") {
            if (Hash::check($request->old_password, $user->password)) {
                if ($request->password == $request->password_confirmation) {
                    $user->password = bcrypt($request->password);
                } else {
                    return redirect()->back()->with('error', 'Konfirmasi password tidak sesuai');
                }
            } else {
                return redirect()->back()->with('error', 'Password lama anda salah');
            }
            $user->save();
            return redirect()->route('dashboard')->with('success', 'Berhasil update password');
        }
    }
}
