<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    public function show()
    {
        return view('deposit');
    }

    public function store(Request $request)
    {
        $request->validate([
            'method' => 'required|in:card,crypto',
            'amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        $user->balance += $request->amount;
        $user->save();

        return redirect()->route('deposit')->with('message', "Deposited $$request->amount successfully!");
    }
}