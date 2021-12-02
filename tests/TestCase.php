<?php

namespace Iamhabbeboy\Subscriber\Tests;

use Closure;
use Iamhabbeboy\Subscriber\Subscriber;
use Mockery;

use \Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    /** @var \Mockery\MockInterface */
    protected $mock;

    /** @var array */
    protected $userInfo;

    /**
     * Setup Test Environment
     *
     * @return void
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->userInfo = [
            'name' => 'John Doe',
            'email' => 'john.doe@gmail.com'
        ];
    }

    /**
     * Mock instance
     *
     * @param $abstract
     * @param Closure|null $mock
     * @return void
     */
    public function mock($abstract, ?Closure $mock = null)
    {
        $mock = Mockery::mock($abstract);

        $this->app->instance($abstract, $mock);

        return $mock;
    }

    protected function createSubscriptionInstance(string $email)
    {
        $service = $this->app->make(Subscriber::class);

        return $service->add($email);
    }
}
