<?php

namespace Iamhabbeboy\Subscriber\Contracts;

interface SubscriberInterface
{
    /**
     * User subscription
     *
     * @param string $email
     * @param string|null $name
     * @return bool
     */
    public function subscribe(string $email, string $name): bool;

    /**
     * Unsubscribe user
     *
     * @param string $email
     * @return boolean
     */
    public function unsubscribe(string $email): bool;
}
