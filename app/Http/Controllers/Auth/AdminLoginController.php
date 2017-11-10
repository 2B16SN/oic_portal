<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

class AdminLoginController extends Controller
{
    public function getGoogleAdAuth()
    {
        $scopes = [
            'https://www.googleapis.com/auth/plus.me',
            'https://www.googleapis.com/auth/plus.profile.emails.read'
        ];

        $parameters = [
            'approval_prompt' => 'auto', //認可されている状態であれば確認画面スキップ
        ];

        return Socialite::driver('google')->scopes($scopes)->with($parameters)->redirect();

    }

    public function getGoogleAdAuthCallback()
    {
        $getUser = Socialite::driver('google')->user();

        /*
        if(!str_contains($getUser->email,'@oic.jp')){
            flash('メールアドレスがoic.jpではありません。学生アカウントでログインしてください。','danger');
            return redirect('/',compact('user->id','user->name'));
        }
        */

        $userModel = app( User::class );
        $user = $userModel->where('email',$getUser->email)->first();

        if(!$user){
            return redirect('/register');
        }else{
            Auth::loginUsingId($user->id);
            $user = Auth::user();
            return redirect()->route('user_home',compact('user'));
        }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('user_home');
    }
}
