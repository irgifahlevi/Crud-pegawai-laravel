<?php

namespace App\Http\Controllers;

use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PegawaiController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $data = Pegawai::where('nama', 'LIKE', '%' . $request->search . '%')->paginate(5);
        } else {
            $data = Pegawai::paginate(6);
        }

        return view('datapegawai', compact('data'));
    }

    public function tambahpegawai()
    {
        return view('tambahdata');
    }

    public function insertdata(Request $request)
    {
        $data = Pegawai::create($request->all());
        if ($request->hasFile('foto')) {
            $request->file('foto')->move('fotopegawai/', $request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('pegawai')->with('success', 'Data berhasil di tambahkan !');
    }

    public function tampilkandata($id)
    {

        $data = Pegawai::find($id);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id)
    {
        $data = Pegawai::find($id);
        $data->update($request->all());
        return redirect()->route('pegawai')->with('success', 'Data berhasil di update!');
    }

    public function delete($id)
    {
        $data = Pegawai::find($id);
        $data->delete();
        return redirect()->route('pegawai')->with('success', 'Data berhasil di hapus!');
    }

    public function exportpdf()
    {
        // $data = Pegawai::all();
        // view()->share('data', $data);
        // $pdf = PDF::loadview('datapegawai-pdf');
        // return $pdf->download('data.pdf');

        $data = Pegawai::all();
        view()->share('data', $data);
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadview('datapegawai-pdf')->setPaper('a4', 'landscape');
        return $pdf->stream('Data-pegawai.pdf');
    }
}
