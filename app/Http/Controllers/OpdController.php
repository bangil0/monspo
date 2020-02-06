<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DaftarOpd;
use App\User;
use App\Helpers\CommunityBPS;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;
use App\KodeBPS;

class OpdController extends Controller
{
    public function index()
    {
        //
        $dataBPS = KodeBPS::get();
        $dataOPD = DaftarOpd::get();
        return view('opd.index',['dataOPD'=>$dataOPD,'dataBPS'=>$dataBPS]);
    }
    public function simpan(Request $request)
    {
        //dd($request->all());
        $count = DaftarOpd::where('opd_kodebps','=',$request->wilayah)->where('opd_nama','=',trim($request->opd_nama))->count();
        if ($count>0) {
            //sudah ada
            $pesan_error = 'Data Dinas/OPD '. $request->opd_nama.' sudah ada';
            $warna_error = 'danger';
        }
        else {
            //input baru
            $dataOPD = new DaftarOpd();
            $dataOPD -> opd_kodebps = $request->wilayah;
            $dataOPD -> opd_nama = trim($request->opd_nama);
            $dataOPD -> opd_alamat = trim($request->opd_alamat);
            $dataOPD -> opd_flag = 1;
            $dataOPD -> save();
            $pesan_error = 'Data Dinas/OPD '. $request->opd_nama.' sudah tersimpan';
            $warna_error = 'success';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('opd.list');
    }
    public function updatedata(Request $request)
    {
        //dd($request->all());
        $count = DaftarOpd::where('opd_id','=',$request->opd_id)->count();
        if ($count>0) {
            //data ada dan edit
            $dataOPD = DaftarOpd::where('opd_id','=',$request->opd_id)->first();
            $dataOPD -> opd_kodebps = $request->wilayah;
            $dataOPD -> opd_nama = trim($request->opd_nama);
            $dataOPD -> opd_alamat = trim($request->opd_alamat);
            $dataOPD -> update();
            $pesan_error = 'Data Dinas/OPD '. $request->opd_nama.' sudah terupdate';
            $warna_error = 'success';
        }
        else {
            $pesan_error = 'Data Dinas/OPD '. $request->opd_nama.' tidak ada';
            $warna_error = 'danger';
            
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('opd.list');
    }
    public function hapus(Request $request)
    {
        //dd($request->all());
        $count = DaftarOpd::where('opd_id','=',$request->opd_id)->count();
        if ($count>0) {
            //data ada dan edit
            $dataOPD = DaftarOpd::where('opd_id','=',$request->opd_id)->first();
            $dataOPD -> delete();
            $pesan_error = 'Data Dinas/OPD '. $request->opd_nama.' sudah dihapus';
            $warna_error = 'success';
        }
        else {
            $pesan_error = 'Data Dinas/OPD '. $request->opd_nama.' tidak ada';
            $warna_error = 'danger';
            
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('opd.list');
    }
}
