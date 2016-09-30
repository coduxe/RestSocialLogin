<?php

use Modules\RestSocialLogin\Tests\TestCase;

class SocialLoginTest extends TestCase
{

  public function testInteractsWithFacebook()
  {
    $this->post('/auth?provider=facebook');
    $this->assertContains('facebook', $this->response->getTargetUrl());
    $this->assertResponseStatus(302);
  }

  public function testInteractsWithGoogle()
  {
    $this->post('/auth?provider=google');
    $this->assertContains('google', $this->response->getTargetUrl());
    $this->assertResponseStatus(302);
  }

  public function testSuccessWithGithub()
  {
    $this->post('/auth?provider=github');
    $this->assertContains('github', $this->response->getTargetUrl());
  }

  public function testSuccessWithLinkedin()
  {
    $this->post('/auth?provider=linkedin');
    $this->assertContains('linkedin', $this->response->getTargetUrl());
  }

}
