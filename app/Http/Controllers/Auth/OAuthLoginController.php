<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\User;
use App\Message;

class OAuthLoginController extends Controller
{
    public function socialLogin() {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallback() {
        try {
            $userSocial = Socialite::driver('twitter')->user();
            $twitter_id = $userSocial->id;

            $user = User::where('twitter_id', $twitter_id)->first();
            if(is_null($user)) {
                $userd = User::create([
                    'name' => $userSocial->name,
                    'email' => $userSocial->getEmail(),
                    'access_token' => $userSocial->token,
                    'access_token_secret' => $userSocial->tokenSecret,
                    'twitter_id' => $userSocial->id,
		 ]);
            	$userd->save();
                Auth::login($userd, true);
            } else {
        	$userd = User::where('twitter_id', $twitter_id)->first();
            	Auth::login($userd, true);
            }
	    $message = Message::where('user_id', $userd->id)->where('read', '0')->orderBy('created_at', 'desc')->paginate(5);
            //return view('top.index',['user' => $userd->id ], compact('userd', 'message'));
            return view('top.index', compact('userd', 'message'));

        } catch (Exception $e) {
            return redirect()->route('/')->withErrors('cannot get infomation of users');
        }

    }

}
