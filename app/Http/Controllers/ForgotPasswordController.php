<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;

class ForgotPasswordController extends Controller
{
    public function index() 
    {
        return view('forgot-password');
    }

    public function submit(ForgotPasswordRequest $request)
    {
        $status = Password::sendResetLink($request->only('email'));

        if(!($status === Password::RESET_LINK_SENT)) {
            throw ValidationException::withMessages(['email' => __($status)]);
        }

        return redirect()->route('home')->with('status', [
            'type' => 'success',
            'message' => sprintf(
                'Uma mensagem foi enviada no email %s. Verifique sua caixa de entrada para redefinir sua senha.',
                $request->email
            )
        ]);
    }
}
