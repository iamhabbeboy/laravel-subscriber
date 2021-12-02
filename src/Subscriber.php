<?php

namespace Iamhabbeboy\Subscriber;

use Iamhabbeboy\Subscriber\Contracts\SubscriberInterface;

class Subscriber
{
    /**
     * Undocumented variable
     *
     * @var Subscriber
     */
    protected SubscriberInterface $service;

    /**
     * Undocumented function
     *
     * @param SubscriberInterface $mailSubscription
     */
    public function __construct(SubscriberInterface $subscriberService)
    {
        $this->service = $subscriberService;
    }

    /**
     * Undocumented function
     *
     * @param string $email
     * @param string|null $name
     * @return boolean
     */
    public function add(string $email, string $name = null): bool
    {
        return (bool) $this->service->subscribe($email, $name);
    }
    /**
     * Undocumented function
     *
     * @param string $email
     * @return boolean
     */
    public function remove(string $email)
    {
        return false;
    }
}
