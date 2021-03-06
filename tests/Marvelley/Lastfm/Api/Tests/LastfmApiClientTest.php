<?php

namespace Marvelley\Lastfm\Api\Tests;

use Marvelley\Lastfm\Api\LastfmApiClient;

class LastfmApiClientTest extends \Guzzle\Tests\GuzzleTestCase
{
    private function getClient()
    {
        $apiKey = getenv('LAST_FM_PHP_CLIENT_API_KEY');

        if (!$apiKey) {
            $this->fail('API key not set');
        }

        $client = LastfmApiClient::factory(array(
            'api_key' => $apiKey
        ));

        return $client;
    }

    public function setUp()
    {
        // Ensure we don't hit the API more than 5 times a second
        usleep(300000);
    }
    
    public function testAlbumGetBuyLinks()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('album.getBuyLinks', array(
            'artist' => 'radiohead',
            'album' => 'in rainbows',
            'country' => 'united kingdom'
        ));
        
        $response = $client->execute($command);

        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }
    
    public function testAlbumGetInfo()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('album.getInfo', array(
            'artist' => 'cher',
            'album' => 'believe'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }
    
    public function testAlbumGetShouts()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('album.getShouts', array(
            'artist' => 'cher',
            'album' => 'believe'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }
    
    public function testAlbumGetTags()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('album.getTags', array(
            'artist' => 'cher',
            'album' => 'believe',
            'user' => 'RJ'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }
    
    public function testAlbumGetTopTags()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('album.getTopTags', array(
            'artist' => 'cher',
            'album' => 'believe'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }
    
    public function testAlbumSearch()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('album.search', array(
            'album' => 'believe'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }

    public function testArtistGetCorrection()
    {
        $client = $this->getClient();

        $command = $client->getCommand('artist.getCorrection', array(
            'artist' => 'guns n roses'
        ));

        $response = $client->execute($command);

        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);

        $this->assertGreaterThan(0, $response->corrections->count());
        $this->assertGreaterThan(0, $response->corrections->correction->count());
        $this->assertEquals("Guns N' Roses", (string)$response->corrections->correction[0]->artist->name);
    }

    public function testArtistGetInfo()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('artist.getInfo', array(
            'artist' => 'cher'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }
    
    public function testArtistGetSimilar()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('artist.getSimilar', array(
            'artist' => 'cher'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }
    
    public function testArtistGetTopTags()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('artist.getTopTags', array(
            'artist' => 'cher'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }

    public function testTrackGetBuyLinks()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('track.getBuyLinks', array(
            'artist' => 'cher',
            'track'  => 'believe',
            'country' => 'united kingdom'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }

    public function testTrackGetInfo()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('track.getInfo', array(
            'artist' => 'cher',
            'track'  => 'believe'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }

    public function testTrackGetShouts()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('track.getShouts', array(
            'artist' => 'cher',
            'track' => 'believe'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }

    public function testTrackGetTags()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('track.getTags', array(
            'artist' => 'cher',
            'track' => 'believe',
            'user' => 'RJ'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }

    public function testTrackGetTopTags()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('track.getTopTags', array(
            'artist' => 'cher',
            'track' => 'believe'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }

    public function testTrackSearch()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('track.search', array(
            'track' => 'believe'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }
    
    public function testTasteometerCompare()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('tasteometer.compare', array(
            'type1' => 'user',
            'type2' => 'artists',
            'value1' => 'truedawn',
            'value2' => 'metallica'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }
    
    public function testUserGetTopTags()
    {
        $client = $this->getClient();
        
        $command = $client->getCommand('user.getTopTags', array(
            'user' => 'RJ'
        ));
        
        $response = $client->execute($command);
        
        $this->assertInstanceOf('SimpleXMLElement', $response);
        $this->assertEquals('ok', (string) $response->attributes()->status);
    }
}
