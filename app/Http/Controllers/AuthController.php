<?php

namespace App\Http\Controllers;

use App\Http\Requests\{ LoginRequest, RegisterRequest, EditAccountRequest };
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request) 
    {
        if(Auth::attempt(['email' => $request->login_email, 'password' => $request->login_password])) {
            $request->session()->regenerate();
            return redirect()->route('form')->with('status', [
                'type' => 'success', 
                'message' => 'Seja bem-vindo, ' . Auth::user()->name . '!'
            ]);
        }

        return redirect()->route('home')->with('status', [
            'type' => 'danger', 
            'message' => 'Email e/ou senha inválidos!'
        ]);
    }

    public function register(RegisterRequest $request) 
    {
        $user = User::create(['user_type' => 2] + $request->only('name', 'email', 'password'));
        Auth::login($user);

        return redirect()->route('form')->with('status', [
            'type' => 'success', 
            'message' => 'Seja bem-vindo, ' . $user->name .'!'
        ]);
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('status', [
            'type' => 'success', 
            'message' => 'Você se deslogou com sucesso.'
        ]);
    }
    
    public function edit() 
    {
        return view('edit-account', ['user' => Auth::user()]);
    }
    
    public function update(EditAccountRequest $request) 
    {
        $user = Auth::user();
        $user->update($request->only('name', 'password'));
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        Auth::login($user);

        return redirect()->route('form')->with('status', [
            'type' => 'success', 
            'message' => 'Seus dados foram atualizados com sucesso!'
        ]);
    }
}
