<?php

use Modules\RestSocialLogin\Tests\TestCase;

class RegisterUserTest extends TestCase
{
  /**
   * A successfull user-password register Test.
   *
   * @return void
   */
  public function testSuccess()
  {
    $params = ['email' => 'paco@email.com', 'password' => 'secret'];

    $this->post('/auth/register', $params);

    $this->assertResponseStatus(200);
    $this->seeInDatabase('users', ['email' => $params['email']]);
    $this->seeJsonStructure(['token', 'user']);
  }
}
