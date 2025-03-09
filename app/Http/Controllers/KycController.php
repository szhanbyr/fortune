<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KycController extends Controller
{
    public function show()
    {
        return view('kyc');
    }

    public function store(Request $request)
    {
        // Fake KYC logic
        return back()->with('kyc_message', 'Account activation: A simplified online verification procedure that requires you to make a deposit of $100 or more. Once the deposit is credited to your balance, verification will be completed.');
    }
}