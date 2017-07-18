<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Session;

class SiteController extends Controller
{
    public function getIndex() {


    }

    public function getDashboard() {

      return view('user.create-session', [

        'user' => DB::table('users')
        ->where('id', '=', Auth::user()->id)
        ->first(),

      ]);

    }

    public function acceptMatch(Request $request) {

        $session_id = $request->input('session-id');

        $session = Session::where('session_id', '=', $session_id)
        ->first();

        //return $session;

        $session->update(['status' => '1']);

    }
}
