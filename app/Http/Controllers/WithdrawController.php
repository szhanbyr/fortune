<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WithdrawController extends Controller
{
    public function show()
    {
        return view('withdraw');
    }

    public function store(Request $request)
    {
        $request->validate([
            'method' => 'required|in:crypto,bank',
            'address' => 'required|string|max:255',
            'amount' => 'required|numeric|min:1',
        ]);

        $user = Auth::user();
        if ($user->balance < $request->amount) {
            return redirect()->route('withdraw')->with('error', 'Insufficient balance!');
        }

        $user->balance -= $request->amount;
        $user->save();

        return redirect()->route('withdraw')->with('message', "Withdrawn $$request->amount successfully!");
    }
}