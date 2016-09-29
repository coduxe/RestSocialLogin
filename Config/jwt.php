<?php

return [
  'secret' => env('JWT_SECRET', 'dentro!'),
  'ttl' => 60,
  'refresh_ttl' => 20160,
  'algo' => 'HS256',
  'user' => 'Modules\RestSocialLogin\Entities\User',
  'identifier' => 'id',
  'required_claims' => ['iss', 'iat', 'exp', 'nbf', 'sub', 'jti'],
  'blacklist_enabled' => env('JWT_BLACKLIST_ENABLED', true),
  'providers' => [
    'user' => 'Tymon\JWTAuth\Providers\User\EloquentUserAdapter',
    'jwt' => 'Tymon\JWTAuth\Providers\JWT\NamshiAdapter',
    'auth' => 'Tymon\JWTAuth\Providers\Auth\IlluminateAuthAdapter',
    'storage' => 'Tymon\JWTAuth\Providers\Storage\IlluminateCacheAdapter',
  ]
];
