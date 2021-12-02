<?php

return [

    /**
     * Subscription service provider
     *  mailchimp
     *  sendy
     */
    'service' => env('SUBSCRIBER_SERVICE', 'mailchimp'),

    /**
     *  Subscription service api key
     */
    'api_key' => env('SUBSCRIBER_API_KEY'),

    /**
     *  Service prefix for mailchimp
     */
    'server_prefix' => env('SUBSCRIBER_SERVER_PREFIX', ''),

    /**
     *  Subscription service list ID
     */
    'list_id' => env('SUBSCRIBER_LIST_ID')
];
