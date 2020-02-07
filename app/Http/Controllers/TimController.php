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
use App\TimPegMapping;

class TimController extends Controller
{
    //
    public function index()
    {
        $dataBPS = KodeBPS::get();
        $dataTim = TimBPS::orderBy('tim_kodebps','asc')->get();
        $arrPeg = array();
        $arrOPD = array();
        $arrTim = array();
        $arr = array('status'=>false,'data'=>'Data tidak tersedia');
        if (count($dataTim) > 0) {
            foreach ($dataTim as $d)
            {
                $arrPegIsi=array();
                $arrOPDisi=array();
                //cek dan list data pegawai
                $dataPeg = TimPegMapping::leftJoin('users',function($join){
                    $join->on('t_mapping.peg_nipbps','=','users.nipbps');
                })->where('tim_id','=',$d->tim_id)->where('users.aktif','=','1')->get();
                $arrPeg = array(
                    'pStatus'=>false,
                    'pData'=>'Data Pegawai tidak tersedia'
                );
                
                if (count($dataPeg) > 0)
                {
                    foreach ($dataPeg as $p)
                    {
                        $arrPegIsi[] = array(
                            'peg_id'=>$p->id,
                            'peg_nama'=>$p->nama,
                            'peg_nip'=>$p->nipbaru,
                            'peg_bpskode'=>$p->kodebps,
                            'peg_bpsnama'=>$p->Pegawai->BPS->bps_nama,
                            'peg_unitkerja'=>$p->satuankerja,
                            'peg_jk'=>$p->jk,
                            'peg_urlfoto'=>$p->urlfoto
                        );
                    }
                    $arrPeg = array(
                        'pStatus'=> true,
                        'pData'=>$arrPegIsi
                    );
                } //batas nya
                //data OPD TIM
                $dataOPD = DaftarOpd::where('opd_tim','=',$d->tim_id)->where('opd_flag','=','1')->get();
                $arrOPD = array(
                    'oStatus'=>false,
                    'oData'=>'Data OPD tidak tersedia'
                );
                if (count($dataOPD)>0)
                {
                    foreach ($dataOPD as $o)
                    {
                        $arrOPDisi[] = array(
                            'opd_id'=> $o->opd_id,
                            'opd_kodebps'=> $o->opd_kodebps,
                            'opd_namabps'=> $o->KodeBPS->bps_nama,
                            'opd_nama'=> $o->opd_nama,
                            'opd_alamat'=> $o->opd_alamat,
                        );
                    }
                    $arrOPD = array(
                        'oStatus'=> true,
                        'oData'=>$arrOPDisi
                    );
                }
                //batas OPD TIM
                $arrTim[] = array(
                    'tim_id' => $d->tim_id,
                    'tim_kodebps' => $d->tim_kodebps,
                    'tim_namabps' => $d->KodeBPS->bps_nama,
                    'tim_nama'=> $d->tim_nama,
                    'tim_flag'=> $d->tim_flag,
                    'itemPeg'=>$arrPeg,
                    'itemOPD'=>$arrOPD
                );
            }
            $arr = array(
                'status'=>true,
                'data'=> $arrTim
            );
        }
        //dd ($arr);
        return view('tim.index',['dataTim'=>$arr,'dataBPS'=>$dataBPS]);
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
    public function TimMapping(Request $request)
    {
        //dd($request->all());
        if ($request->pegawai) {
            $pegawai = $request->pegawai;
            $tim_id = $request->tim_id;
            foreach  ($pegawai as $item)
            {
                $data = new TimPegMapping();
                $data->tim_id = $tim_id;
                $data->peg_nipbps = $item;
                $data->save();
            }
            $pesan_error = 'Mapping pegawai '.$request->tim_bpsnama.' ke '. $request->tim_nama.' sudah tersimpan';
            $warna_error = 'success';
        }
        else {
            //pegawai kosong utk dimasukkan ke tim
            $pesan_error = 'Nama Pegawai '.$request->tim_bpsnama.' belum ada terpilih';
            $warna_error = 'danger';
        }
        //dd($request->all());
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('tim.list');
    }
    public function TimMapOPD(Request $request)
    {
        //dd($request->all());
        if ($request->opd) {
            $opd = $request->opd;
            $tim_id = $request->tim_id;
            foreach  ($opd as $item)
            {
                $data = DaftarOpd::where('opd_id','=',$item)->first();
                $data->opd_tim = $tim_id;
                $data->update();
            }
            $pesan_error = 'Mapping OPD '.$request->tim_bpsnama.' ke '. $request->tim_nama.' sudah tersimpan';
            $warna_error = 'success';
        }
        else {
            //pegawai kosong utk dimasukkan ke tim
            $pesan_error = 'Nama OPD '.$request->tim_bpsnama.' belum ada terpilih';
            $warna_error = 'danger';
        }
        //dd($request->all());
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $warna_error);
        return redirect()->route('tim.list');
    }
}
