<?php

namespace Iamhabbeboy\Subscriber\Contracts\Services;

use Exception;
use GuzzleHttp\Exception\ClientException;
use Iamhabbeboy\Subscriber\Traits\MailChimpConfig as Config;
use Iamhabbeboy\Subscriber\Contracts\SubscriberInterface;

class MailChimp implements SubscriberInterface
{
    use Config;

    /**
     * @param string STATUS
     */
    const STATUS = "pending";

    /**
     * User Subscription
     *
     * @param string $email
     * @param string $name
     * @return boolean
     */
    public function subscribe(string $email, string $name = null): string
    {
        if (empty($email)) {
            throw new \Exception('Email address is required');
        }

        try {
            $response = $this->config()->lists->addListMember(config('subscription.list_id'), [
                "name" => $name,
                "email_address" => $email,
                "status" => self::STATUS,
            ]);

            return $response->id;
        } catch (ClientException $e) {
            return $e->getMessage();
        }
    }

    /**
     * Unsubscribe user
     *
     * @param string $email
     * @return boolean
     */
    public function unsubscribe(string $email): bool
    {
        try {
            $subscriber = $this->subscribe($email);

            if ($subscriber instanceof Exception) {
                return false;
            }

            if ($subscriber instanceof ClientException) {
                return false;
            }

            $response = $this->config()->lists->deleteListMemberPermanent(
                config('subscription.list_id'),
                $subscriber
            );

            return (bool) $response->id;
        } catch (ClientException $e) {
            return false;
        }
    }
}
