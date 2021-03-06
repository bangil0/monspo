<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Helpers\CommunityBPS;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Auth;

class PegawaiController extends Controller
{
    //
    public function index()
    {
        $dataPegawai = User::all();
        return view('pegawai.index',['dataPegawai'=>$dataPegawai]);
    }
    public function syncKabkota($kodekabkota)
    {
        $h = new CommunityBPS(Auth::user()->username,Auth::user()->passwd);
        $hasil = $h->get_list_pegawai_kabkot($kodekabkota);
        $tot=0;
        //dd($hasil);
        if ($hasil) 
        {
            for ($i=0;$i<count($hasil);$i++)
            {
                $count_peg = User::where('nipbps','=',$hasil[$i]['nipbps'])->count();
                if ($count_peg>0) {
                    //jika sudah ada update isiannya nama, satuan, urlfoto
                    $data = User::where('nipbps','=',$hasil[$i]['nipbps'])->first();
                    $data->nama = $hasil[$i]['nama'];
                    $data->satuankerja = $hasil[$i]['satuankerja'];
                    $data->urlfoto = $hasil[$i]['urlfoto'];
                    $data->update();
                    $tot++;
                }
                else {
                    //belum ada
                    /*
                    'nama'=>$nama,
                    'nipbps'=>$nipbps,
                    'nippanjang'=>$nippanjang,
                    'email'=>$email,
                    'username'=>$username,
                    'jabatan'=>$jabatan,
                    'satuankerja'=>$satuankerja,
                    'alamatkantor'=>$alamatkantor,
                    'urlfoto'=>$urlfoto
                    */
                    $data = new User();
                    $data->nama = $hasil[$i]['nama'];
                    $data->nipbps = $hasil[$i]['nipbps'];
                    $data->nipbaru = $hasil[$i]['nippanjang'];
                    $data->email = $hasil[$i]['email'];
                    $data->username = $hasil[$i]['username'];
                    $data->jabatan = $hasil[$i]['jabatan'];
                    $data->satuankerja = $hasil[$i]['satuankerja'];
                    $data->urlfoto = $hasil[$i]['urlfoto'];
                    $data->jk = substr($hasil[$i]['nippanjang'],-4,1);
                    $data->mitra = false;
                    $data->level = '2';
                    $data->kodebps = $kodekabkota;
                    $data->password = bcrypt('null');
                    $data->save();
                    $tot++;
                }  
            }
            $pesan_error='Data pegawai sebanyak '.$tot.' sudah disync';
            $pesan_status=true;
            $pesan_warna = 'success';
        }
        else {
            $pesan_error='Data tidak tersedia';
            $pesan_status=false;
            $pesan_warna = 'danger';
        }
        $arr = array('data'=>$pesan_error,'status'=>$pesan_status);
        //return Response()->json($arr);
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $pesan_warna);
        return redirect()->route('pegawai.list');
    }
    public function syncProvinsi($kodeprov)
    {
        //
        //dd($kodeprov);
        $h = new CommunityBPS(Auth::user()->username,Auth::user()->passwd);
        $hasil = $h->get_list_pegawai_provinsi($kodeprov);
        $tot=0;
        //dd($hasil);
        if ($hasil) {
            //$banyak = count($hasil);
            for ($i=0;$i<count($hasil);$i++)
            {
                if ($i==0) {
                    //pasti kepala
                    if ($hasil[0]!=false) {
                        //cek kepala bps ada atau tidak
                        $count_peg = User::where('nipbps','=',$hasil[0]['nipbps'])->count();
                        if ($count_peg>0) {
                            //jika sudah ada update isiannya nama, satuan, urlfoto
                            $data = User::where('nipbps','=',$hasil[$i]['nipbps'])->first();
                            $data->nama = $hasil[$i]['nama'];
                            $data->satuankerja = $hasil[$i]['satuankerja'];
                            $data->urlfoto = $hasil[$i]['urlfoto'];
                            $data->update();
                            $tot++;
                        }
                        else {
                            //belum ada
                            /*
                            'nama'=>$nama,
                            'nipbps'=>$nipbps,
                            'nippanjang'=>$nippanjang,
                            'email'=>$email,
                            'username'=>$username,
                            'jabatan'=>$jabatan,
                            'satuankerja'=>$satuankerja,
                            'alamatkantor'=>$alamatkantor,
                            'urlfoto'=>$urlfoto
                            */
                            $data = new User();
                            $data->nama = $hasil[0]['nama'];
                            $data->nipbps = $hasil[0]['nipbps'];
                            $data->nipbaru = $hasil[0]['nippanjang'];
                            $data->email = $hasil[0]['email'];
                            $data->username = $hasil[0]['username'];
                            $data->jabatan = $hasil[0]['jabatan'];
                            $data->satuankerja = $hasil[0]['satuankerja'];
                            $data->urlfoto = $hasil[0]['urlfoto'];
                            $data->jk = substr($hasil[0]['nippanjang'],-4,1);
                            $data->mitra = false;
                            $data->level = '2';
                            $data->kodebps = $kodeprov;
                            $data->password = bcrypt('null');
                            $data->save();
                            $tot++;
                        }                 
                    }
                }
                else {
                    //langsung simpan
                    for ($j=0;$j<count($hasil[$i]);$j++)
                        {
                            $count_peg = User::where('nipbps','=',$hasil[$i][$j]['nipbps'])->count();
                            if ($count_peg>0) {
                                //jika sudah ada update isiannya nama, satuan, urlfoto
                                $data = User::where('nipbps','=',$hasil[$i][$j]['nipbps'])->first();
                                $data->nama = $hasil[$i][$j]['nama'];
                                $data->satuankerja = $hasil[$i][$j]['satuankerja'];
                                $data->urlfoto = $hasil[$i][$j]['urlfoto'];
                                $data->update();
                                $tot++;
                            }
                            else {
                                //belum ada
                                /*
                                'nama'=>$nama,
                                'nipbps'=>$nipbps,
                                'nippanjang'=>$nippanjang,
                                'email'=>$email,
                                'username'=>$username,
                                'jabatan'=>$jabatan,
                                'satuankerja'=>$satuankerja,
                                'alamatkantor'=>$alamatkantor,
                                'urlfoto'=>$urlfoto
                                */
                                $data = new User();
                                $data->nama = $hasil[$i][$j]['nama'];
                                $data->nipbps = $hasil[$i][$j]['nipbps'];
                                $data->nipbaru = $hasil[$i][$j]['nippanjang'];
                                $data->email = $hasil[$i][$j]['email'];
                                $data->username = $hasil[$i][$j]['username'];
                                $data->jabatan = $hasil[$i][$j]['jabatan'];
                                $data->satuankerja = $hasil[$i][$j]['satuankerja'];
                                $data->urlfoto = $hasil[$i][$j]['urlfoto'];
                                $data->jk = substr($hasil[$i][$j]['nippanjang'],-4,1);
                                $data->mitra = false;
                                $data->level = '2';
                                $data->kodebps = $kodeprov;
                                $data->password = bcrypt('null');
                                $data->save();
                                $tot++;
                            }   
                        }
                }
            }
            $pesan_error='Data pegawai sebanyak '.$tot.' sudah disync';
            $pesan_status=true;
            $pesan_warna='success';
        }
        else {
            $pesan_error='Data tidak tersedia';
            $pesan_status=false;
            $pesan_warna='danger';
        }
        
        //dd($hasil);
        //var_dump($hasil);
        $arr = array('data'=>$pesan_error,'status'=>$pesan_status);
        //return Response()->json($arr);
        Session::flash('message', $pesan_error);
        Session::flash('message_type', $pesan_warna);
        return redirect()->route('pegawai.list');
    }
    public function PegApi($kodebps)
    {
        $count = User::where('kodebps','=',$kodebps)->where('aktif','=','1')->where('mitra','=','0')->count();
        $arr = array('status'=>false,'peg_jumlah'=>0,'hasil'=>'Data tidak tersedia');
        if ($count > 0) {
            //data pegawainya ada
            $data = User::where('kodebps','=',$kodebps)->where('aktif','=','1')->where('mitra','=','0')->get();
            foreach ($data as $item) 
            {
                $hasil[] = array(
                    'peg_id'=>$item->id,
                    'peg_nama'=>$item->nama,
                    'peg_nip'=>$item->nipbps,
                    'peg_unitkerja'=>$item->satuankerja,
                    'peg_jk'=>$item->jk,
                    'peg_urlfoto'=>$item->urlfoto,
                    'peg_level'=>$item->level
                );
            }
            $arr = array(
                'status'=>true,
                'peg_jumlah'=>$count,
                'hasil' => $hasil
            );
        }
        return Response()->json($arr);
    }
}
