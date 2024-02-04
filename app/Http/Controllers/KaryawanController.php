<?php

namespace App\Http\Controllers;

use App\Models\Jabatan_karyawan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $dataKaryawan = Karyawan::all();
        $dataKaryawan = Karyawan::with('jabatan')->latest()->paginate(10);
        return view('administrator.data_karyawan', compact('dataKaryawan'));
    }

    public function cetak_karyawan()
    {
        // $dataKaryawan = Karyawan::all();
        $dataCetakKaryawan = Karyawan::with('jabatan')->get();
        return view('administrator.cetak_pegawai', compact('dataCetakKaryawan'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dataJabatan = Jabatan_karyawan::all();
        return view('administrator.add_new_employee', compact('dataJabatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Karyawan::create([
            'name' => $request->name,
            'jabatan_id' => $request->jabatan_id,
            'address' => $request->address,
            'birthday_date' => $request->birthday_date
        ]);

        return redirect('data_karyawan')->with('toast_success', 'Data Input Successfully!');
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
        $dataJabatan = Jabatan_karyawan::all();
        $karyawan = Karyawan::with('jabatan')->findorfail($id);
        return view('administrator.edit_data_karyawan', compact('karyawan', 'dataJabatan'));
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
        $karyawan = Karyawan::findorfail($id);
        $karyawan->update($request->all());

        return redirect('data_karyawan')->with('toast_success', 'Data Edited Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $karyawan = Karyawan::findorfail($id);
        $karyawan->delete();

        return back()->with('info', 'Data Successfully Deleted!');
    }
}
