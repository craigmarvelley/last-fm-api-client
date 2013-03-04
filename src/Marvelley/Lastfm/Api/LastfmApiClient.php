<?php

namespace Marvelley\Lastfm\Api;

use Guzzle\Service\Client;
use Guzzle\Service\Inspector;
use Guzzle\Service\Description\ServiceDescription;
use Guzzle\Common\Collection;

class LastfmApiClient extends Client
{
    /**
     * Factory method to create a new LastfmApiClient
     *
     * @param array|Collection $config Configuration data. Array keys:
     *    base_url - Base URL of web service
     *
     * @return LastfmApiClient
     */
    public static function factory($config = array())
    {
        $default = array(
            'base_url' => "http://ws.audioscrobbler.com/2.0/?api_key={api_key}",
        );

        $required = array('base_url', 'api_key');
        $config = Collection::fromConfig($config, $default, $required);

        $client = new self($config->get('base_url'));

        $client->setConfig($config);
        $client->setUserAgent('marvelley-lastfm-api-client');
        $client->setDescription(ServiceDescription::factory(__DIR__ . DIRECTORY_SEPARATOR . 'client.json'));

        return $client;
    }
}
