<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\LoginMail;
use App\Models\AuthToken;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class LoginController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }

    public function Login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        if (User::where('email', '=', $request['email'])->count() > 0) {
            echo 'user logged in';
        } else {
            User::Create([
                'email' => $request['email'],
            ]);
        };

        $token = Str::random(12);

        DB::table('auth_tokens')->insert([
            'token' => $token,
            'expires_at' => Carbon::now()->addMinutes(10),
        ]);

        Mail::to($request->email)->send(new LoginMail($token));

        return redirect('validate');
    }

    public function getValidation()
    {
        return view('ValidationToken');
    }

    public function validateToken(Request $request)
    {
        $request->validate([
            'token' => 'required',
        ]);
        $token=AuthToken::where('token', '=', $request['token'])->where('expires_at', '>', Carbon::now());

        if ($token->exists()) {
            $token->delete();
            return response()->json('token validated');     
        } else {
            return redirect('login');
        };
        
    }
}
