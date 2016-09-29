<?php

Route::group(['prefix' => 'auth', 'middleware' => ['web'], 'namespace' => 'Modules\RestSocialLogin\Http\Controllers'], function()
{
    Route::post('/', 'RestSocialLoginController@authenticate');
    Route::get('/callback', 'RestSocialLoginController@handleProviderCallback');
    Route::post('/register', 'RestSocialLoginController@register');
});
