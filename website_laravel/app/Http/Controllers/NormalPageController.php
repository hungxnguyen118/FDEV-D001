<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class NormalPageController extends Controller
{
    //
    function index(){
        $user_info = Session::get('user_info');

        $list_sach_noi_bat = DB::select('SELECT s.*, ten_tac_gia
        FROM bs_sach s JOIN bs_tac_gia tg ON s.id_tac_gia = tg.id
        WHERE noi_bat = 1');

        return view('trang_chu')
            ->with('user_info', $user_info)
            ->with('list_sach_noi_bat', $list_sach_noi_bat);
    }

    function logout(Request $request){
        Session::forget('user_info');

        return redirect($request->server('HTTP_REFERER'), 302);
    }
}
