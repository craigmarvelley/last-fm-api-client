# Last.fm API client

This is a client for the last.fm API. It uses the [Guzzle][1] web service library.
The client API is a custom web service client based on `Guzzle\Service\Client`.

## Installation
Use composer to install the library and all its dependencies:

    composer require "marvelley/lastfm-api:1.0.*@dev" 

## Basic Usage Example

Before you can use the library you have to request your API key on the [last.fm API page][2].  
Put that key in the following code and run the code from the command line:

```php
require 'vendor/autoload.php';

use Marvelley\Lastfm\Api\LastfmApiClient;

$l = LastfmApiClient::factory(array('api_key' => 'your_api_key'));
$ai = $l->getCommand('artist.getInfo', array(
	'artist' => 'Elvis Presley', 
	"format" => "json"
));
$result = $ai->execute();
echo "Similar artists:\n";
foreach($result['artist']['similar']['artist'] as $artist) {
	printf("  - %s\n", $artist['name']);
}
```

[1]: http://guzzlephp.org/
[2]: http://last.fm/api

## Running integration tests

Before running the test suite you need to configure a specific environment variable with a valid last.fm API key. For example, from your terminal:

```
$ export LAST_FM_PHP_CLIENT_API_KEY=your_api_key
```

or add a similar entry to your bash/zsh/whatever config file.

You can then run the test suite via:

```
$ phpunit
```

from the root of the project directory (assuming you have PHPUnit installed and on the path).