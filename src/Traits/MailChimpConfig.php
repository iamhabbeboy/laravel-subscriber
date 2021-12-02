<?php

namespace Iamhabbeboy\Subscriber\Traits;

use MailchimpMarketing\ApiClient;

trait MailChimpConfig
{
    /**
     * Setup package config
     *
     * @return ApiClient
     */
    public function config(): ApiClient
    {
        $client = new ApiClient();

        return $client->setConfig([
            'apiKey' => config('service.api_key'),
            'server' => config('service.server_prefix')
        ]);
    }
}
