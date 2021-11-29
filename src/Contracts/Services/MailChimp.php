<?php

namespace Iamhabbeboy\Subscriber\Contracts\Services;

use Iamhabbeboy\Subscriber\Contracts\SubscriberInterface;

class MailChimp implements SubscriberInterface
{
    /**
     * User Subscription
     *
     * @param string $email
     * @param string $name
     * @return boolean
     */
    public function subscribe(string $email, string $name = null): bool
    {
        echo 'Mailchimp';
        return true;
    }

    /**
     * Unsubscribe user
     *
     * @param string $email
     * @return boolean
     */
    public function unsubscribe(string $email): bool
    {
        return false;
    }
}
