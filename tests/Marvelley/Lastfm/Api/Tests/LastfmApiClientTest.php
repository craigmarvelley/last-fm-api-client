<?php

namespace Marvelley\Lastfm\Api\Tests;

use Marvelley\Lastfm\Api\LastfmApiClient;

class LastfmApiClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    public function testGetBuyLinks()
    {
        $client = LastfmApiClient::factory(array(
            'api_key' => 'b25b959554ed76058ac220b7b2e0a026'
        ));
        
        $command = $client->getCommand('album.getBuyLinks', array(
            'artist' => 'radiohead',
            'album' => 'in rainbows',
            'country' => 'united kingdom'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
    }
    
    public function testTasteometerCompare()
    {
        $client = LastfmApiClient::factory(array(
            'api_key' => 'b25b959554ed76058ac220b7b2e0a026'
        ));
        
        $command = $client->getCommand('tasteometer.compare', array(
            'type2' => 'artists',
            'value1' => 'truedawn',
            'value2' => 'metallica'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
    }
}
