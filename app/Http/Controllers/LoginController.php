<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class LoginController
{
    public function showLoginForm()
    {
        return view('login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:customers,email',
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $customer = Customer::create([
            'name' => $validated['name'],
            'address' => $validated['address'],
            'email' => $validated['email'],
        ]);

         auth()->login($customer);

        return redirect()->route('login.success');
    }

    public function loginSuccess()
    {
        return view('login-success');
    }
}
