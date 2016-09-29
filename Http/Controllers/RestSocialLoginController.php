<?php

namespace Modules\RestSocialLogin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\RestSocialLogin\Http\Requests\RestSocialLoginRequest;
use Modules\RestSocialLogin\Http\Requests\RegisterUserRequest;
use Modules\RestSocialLogin\Entities\User;
use Socialite;
use Lang;
use JWTAuth;

class RestSocialLoginController extends Controller
{
  /**
  * Socialite go to provider.
  * @param Request
  * @return Response
  */
  public function authenticate(RestSocialLoginRequest $request)
  {
    if ($request->provider == 'normal') {
      $token = JWTAuth::attempt($request->only('email', 'password'));

      if (!$token) {
        return response()->json(['error' => Lang::get('sociallogin::validation.invalid_credentials')], 400);
      }

      return response()->json(['token' => $token, 'user' => JWTAuth::toUser($token)]);
    }

    return Socialite::driver($request->provider)->redirect();
  }

  /**
  * Socialite redirect back.
  * @param Request
  * @return Response
  */
  public function handleProviderCallback(RestSocialLoginRequest $request)
  {
    $provider = Socialite::driver($request->provider);

    if ($request->error) {
      return redirect()->to(config('sociallogin.client_redirect_url').'?error='.$request->error);
    }

    if ($request->code) {
      $socialUser = $provider->user();
      $user = User::firstOrCreate(['email' => $socialUser->getEmail()]);
      $token = $user->getToken();

      return redirect()->to(config('sociallogin.client_redirect_url').'?token='.$token);
    }

    return response()->json(['error' => Lang::get('sociallogin::validation.invalid_credentials')], 400);
  }

  /**
  * Register new User.
  * @param Request
  * @return Response
  */
  public function register(RegisterUserRequest $request)
  {
    if (!User::where('email', '=', $request->email)->get()->isEmpty()) {
      return response()->json(['error' => Lang::get('sociallogin::validation.already_registered')], 400);
    }

    $request->password = bcrypt($request->password);
    $user = User::create($request->only('email', 'password'));

    return response()->json(['token' => $user->getToken(), 'user' => $user]);
  }
}
