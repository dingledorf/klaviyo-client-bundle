<?php

namespace Rove\KlaviyoClientBundle\Client\Resource;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class TrackResource extends Resource
{
	const ENDPOINT = 'track';

	public function __construct(Client $client, $uri)
	{
		parent::__construct($uri, self::ENDPOINT, $client);
	}


	public function trackEvent($body)
	{
		$headers = [

		];

		$request = new Request('GET', $this->endpoint . '?data=' . urlencode(base64_encode($body)), $headers, $body);

		return $this->client->send($request, $this->defaultOptions);
	}
}