<?php

use Modules\RestSocialLogin\Tests\TestCase;
use Modules\RestSocialLogin\Entities\User;

class NormalLoginTest extends TestCase
{

  /**
   * A successfull user-password login Test.
   *
   * @return void
   */
  public function testSuccess()
  {
    $params = ['email' => 'user@email.com', 'password' => 'secret'];
    $user = User::create(['email'=> $params['email'], 'password' => bcrypt($params['password'])]);

    $this->post('/auth?provider=normal', $params);
    $this->assertResponseStatus(200);
    $this->seeJsonStructure(['token', 'user']);
  }

}
