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

		$request = new Request('GET', $this->endpoint . '?data=' . urlencode(base64_encode($body)), [
			'headers' => $headers,
			'connect_timeout' => 30,
			'timeout' => 30
		], $body);

		return $this->client->send($request);
	}
}