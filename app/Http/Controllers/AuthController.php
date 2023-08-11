<?php

namespace App\Http\Controllers;

use Azate\LaravelTelegramLoginAuth\TelegramLoginAuth;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
	public function login(TelegramLoginAuth, $telegramLoginAuth, Request $request) {

		if ($telegramUserData = $telegramLoginAuth->validate($request)) {
			return back();
		}

		$tgUser = TelegramUser::fromData($telegramUserData);

		Auth::login($tgUser->user, true);
		$request->session()->regenerate();

		return redirect()->intended('index');
	}
}
