<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;
use App\User;
use App\Helpers\CommunityBPS;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function username()
    {
        return 'username';
    }
    public function getUserIpAddr()
    {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_REAL_IP']))
            $ipaddress = $_SERVER['HTTP_X_REAL_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';    
        return $ipaddress;
     }
    public function showLoginForm()
    {
        //$dataTahunDasar = \App\TahunDasar::orderBy('tahun', 'asc')->get();
        //return view('login.v2', compact('dataTahunDasar'));
        return view('login.index');
    }
    protected function validateLogin(Request $request)
    {
        $dd_cek_username = User::where('username','=',$request->username)->first();
        if ($dd_cek_username)
        {
        if ($dd_cek_username->isLokal==1) {
            //cek pake auth login
            $this->validate($request, [
                $this->username() => 'required|string',
                'password' => 'required|string',
            ]);
        }
        else {
            //cek pake communityBPS
            $h = new CommunityBPS($request->username,$request->password);
            if ($h->errorLogin==false) {
                //berhasil login
                //Auth::login($request->username);
                //return redirect('/');
                //dd(Auth::user()->nama);
                dd($h);
               
            }
            else {
                //salah password
                return view('login.index');
            }
        }
        }
        else {
            //tidak ada username
            return view('login.index');
        }
        
    }
    
    protected function attemptLogin(Request $request)
    {
        return $this->guard()->attempt(
            $this->credentials($request),
            $request->filled('remember')
        );
    }
    protected function credentials(Request $request)
    {
        return $request->only($this->username(), 'password');
    }
    
    /*
    public function authenticated(Request $request, $user)
    {
        /*
        $user->lastlogin = Carbon::now()->toDateTimeString();
        //$user->lastip = $request->getClientIp();
        $user->lastip = $this->getUserIpAddr();
        $user->save();
        Session::put('tahun_anggaran', $request->tahun_anggaran);
        
    }
    */
}
