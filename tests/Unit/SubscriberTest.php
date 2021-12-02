<?php

namespace Iamhabbeboy\Subscriber\Tests\Unit;

use Iamhabbeboy\Subscriber\Subscriber;
use Iamhabbeboy\Subscriber\Tests\TestCase;

class SubscriberTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        $this->mock = $this->mock(Subscriber::class);
    }

    /** @test */
    public function user_subscribed_successfully()
    {
        $this->mock->shouldReceive('add')->with($this->userInfo['email'])->andReturn(true);

        $this->assertTrue($this->createSubscriptionInstance($this->userInfo['email']));
    }

    /** @test */
    public function user_subscribe_with_empty_email()
    {
        $this->mock->shouldReceive('add')->with('')->andReturn(false);

        $this->assertFalse($this->createSubscriptionInstance($this->userInfo['email']));
    }
}
