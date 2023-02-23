<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Tournament;

class AdminController extends Controller
{
    public function getRegistration()
    {
        return view('registration.registration');
    }

    public function getPanel()
    {
        return view('panel');
    }

    public function importFile(Request $request)
    {
        $filename = $request->file('users')->getClientOriginalName();
        $request->file('users')->storeAs('public/csv', $filename);
        $path = public_path('storage/csv/' . $filename);

        $users = (new FastExcel)->import($path, function ($line) {
            
                DB::table('users_tournaments')->insert([
                    'nome_torneo' => $line['tournament'],
                    'email_utente' => $line['email'],
                ]);

                return User::firstOrCreate(
                    [
                        'email' => $line['email'],
                        'firstName' => $line['firstName'],
                        'lastName' => $line['lastName'],
                        'role' => $line['role'],
                        'dci' => $line['dci'],
                        'country' => $line['country'],
                        'status' => $line['status'],
                    ],
                );
                   
        });
        return redirect('getPanel');
       
    }
}
