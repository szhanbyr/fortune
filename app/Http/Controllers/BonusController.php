<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BonusController extends Controller
{
    public function show()
    {
        return view('bonus');
    }

    public function spin(Request $request)
    {
        $bonuses = [50, 100, 250, 500, 1000];
        $bonus = $bonuses[array_rand($bonuses)];

        $user = Auth::user();
        $user->balance += $bonus;
        $user->save();

        return redirect()->route('bonus')->with('bonus_message', "You won $$bonus!");
    }
}