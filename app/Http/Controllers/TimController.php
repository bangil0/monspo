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
use App\TimBPS;

class TimController extends Controller
{
    //
    public function index()
    {
        $dataBPS = KodeBPS::get();
        $dataTim = TimBPS::get();
        return view('tim.index',['dataBPS'=>$dataBPS,'dataTim'=>$dataTim]);
    }
    public function simpan(Request $request)
    {
        //dd($request->all());
        $count = TimBPS::where('tim_nama','=',trim($request->tim_nama))->where('tim_kodebps','=',$request->tim_kodebps)->count();
        if ($count>0) 
        {
            //ada nama yg sama
            $pesan_error = 'Nama TIM '. $request->tim_nama.' sudah ada';
            $warna_error = 'danger';
        }
        else 
        {
            //input nama tim
            $data = new TimBPS();
            $data->tim_kodebps = $request->tim_kodebps;
            $data->tim_nama = trim($request->tim_nama);
            $data->save();
            $pesan_error = 'Data TIM '. $request->tim_nama.' sudah tersimpan';
            $warna_error = 'success';
        }
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('tim.list');
    }
}
