<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{ Hash, Password };
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class ResetPasswordController extends Controller
{
    public function index(string $token) 
    {
        return view('reset-password', ['token' => $token]);
    }

    public function submit(ResetPasswordRequest $request, string $token)
    {
        $status = Password::reset(
            array_merge(
                $request->only('email', 'password', 'passwordConfirmation'), 
                ['token' => $token]
            ),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));
                $user->save();
    
                event(new PasswordReset($user));
            }
        );

        if(!($status === Password::PASSWORD_RESET)) {
            throw ValidationException::withMessages(['email' => __($status)]);
        }

        return redirect()->route('home')->with('status', [
            'type' => 'success',
            'message' => 'Sua senha foi redefinida com sucesso!'
        ]);
    }
}
