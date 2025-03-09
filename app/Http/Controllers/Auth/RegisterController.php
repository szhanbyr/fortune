<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/dashboard';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'balance' => 0.00,
            'bonus_spun' => false,
        ]);
    }

    public function spinBonus(Request $request)
    {
        $user = auth()->user();
        if ($user->bonus_spun) {
            return redirect()->route('dashboard');
        }

        $bonus = 50; // Fixed $50 bonus

        $user->balance += $bonus;
        $user->bonus_spun = true;
        $user->save();

        return redirect()->route('dashboard'); // No success message, just redirect
    }
}