<?php

namespace Modules\RestSocialLogin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use JWTAuth;

class User extends Authenticatable
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = ['email', 'password'];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = ['password'];

  /**
   * Get user JWT Token
   *
   * @var array
   */
  public function getToken()
  {
    return JWTAuth::fromUser($this);
  }

}
