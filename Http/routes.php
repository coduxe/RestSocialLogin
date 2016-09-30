<?php

use Illuminate\Session\Middleware\StartSession;

Route::group(['prefix' => 'auth', 'middleware' => StartSession::class, 'namespace' => 'Modules\RestSocialLogin\Http\Controllers'], function()
{
    Route::post('/', 'RestSocialLoginController@authenticate');
    Route::get('/callback', 'RestSocialLoginController@handleProviderCallback');
});
