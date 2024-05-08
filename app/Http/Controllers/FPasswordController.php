<?php

namespace App\Http\Controllers;


use App\Models\User;

use Illuminate\Http\Request;

//namespace App\Http\Controllers\Auth;


use Illuminate\Support\Facades\Password;



use Illuminate\Support\Str;


class FPasswordController extends Controller
{
    //

    public function forgot() {
        return view('x');
    }


    public function sendResetLinkEmail(Request $request)
    {
        $user = User::whereEmail($request->input('email'))->first();

        if (!$user) {
            return back()->withInput()->withErrors(['email' => 'User not found']);
        }

        $token = Str::random(60);


       //dd($token);
       
        $user->token = $token;
        $user->save();

        $link = url('/password/reset/' . $token);

        $message = 'Please click on the link to reset your password: ' . $link;

        return back()->withInput()->withErrors(['email' => $message]);
    }

    public function reset(Request $request, $token)
    {
        $user = User::wherePasswordResetToken($token)->first();

        if (!$user) {
            return back()->withInput()->withErrors(['email' => 'Invalid token']);
        }

        $user->password = bcrypt($request->input('password'));
        $user->password_reset_token = null;
        $user->save();

        return redirect('/login')->withSuccess('Password reset successfully');
    }


}
