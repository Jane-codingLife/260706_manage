<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\DB as FacadesDB;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        // 載入畫面
        return view('login');
    }
    public function welcome()
    {
        // 載入畫面
        return view('index');
    }
    public function logout()
    {
        Session::forget('aid');
        return view('login');
    }
    public function checkId(request $request)
    {
        // 檢查帳號跟密碼
        $usr = FacadesDB::table('admin')->where('aid', '=', $request['usrAccount'])->first();
        if ($usr != null) {
            if ($usr->passwd == $request['usrPassword']) {
                $dt = date("F j, Y, g:i a");
                Session::put('sLogintime', $dt);
                Session::put('aname', $usr->aname);
                Session::put('aid', $usr->aid);
                return redirect('index');
            } else {
                return redirect()->back()->withInput()->withErrors(['密碼輸入錯誤！請重新輸入。']);
            }
        } else {
            return redirect()->back()->withInput()->withErrors(['帳號輸入錯誤！請重新輸入。']);
        }
    }
}
