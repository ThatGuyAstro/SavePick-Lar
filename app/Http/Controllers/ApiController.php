<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use App\Session;


class ApiController extends Controller
{

  public function getUsers() {

    $users = DB::table('users')->get();

    return $users;

  }

  public function getSessions() {

    $sessions = Session::get();

    return $sessions;

  }

  public function createSession() {

    $session = new Session();

  }

  public function acceptMatch(Request $request) {

    if($request->isMethod('post')) {

      $session_id = $request->input('session-id');
      $session_password = $request->input('session-password');

      if(!($session = Session::where('session_id', '=', $session_id)
      ->first())) {

        return 'error: session id does not exist';

      }

      if($session = Session::where('session_id', '=', $session_id)
      ->first()) {

          if($session_password == $session->session_password) {

              if($session->update(['status' => '1'])) {

                return 'success';

              } else {

                return 'error';

              }

          } else {

            return 'error: invalid session password';

          }

      }




    }

  }

  public function generateRandomString($length) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
     }

}
