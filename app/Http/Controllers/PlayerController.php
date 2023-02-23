<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayerController extends Controller
{

    public function getPersonalPage()
    {
        return view('user.personal');
    }

    public function getPairingsPage()
    {
        return view('user.pairings');
    }

    public function getStandingsPage()
    {
        return view('user.standings');
    }

    public function RedirectToPersonal(Request $request)
    {
        $protocol = ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $CurPageURL = $protocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

return $CurPageURL;
        $torneo = $request->torneo;

       // return redirect()->route('personal', [$torneo]);
    }

    public function index(Request $request)
    {
        $id = $request->id;
        $email = User::where('id', '=', $id)->value('email');
        $tournaments  = DB::table('users_tournaments')->where('email_utente', '=', $email)->get('nome_torneo');
        //return response()->json($tournaments_name);

        $data = [
            'tournaments' => $tournaments
        ];

        return view('user.index', $data);
    }
}
