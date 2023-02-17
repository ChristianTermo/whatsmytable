<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
use App\Models\User;

class AdminController extends Controller
{
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
