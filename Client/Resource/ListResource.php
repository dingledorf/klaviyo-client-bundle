<?php

namespace Rove\KlaviyoClientBundle\Client\Resource;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class ListResource extends Resource
{
	const ENDPOINT = 'v2/list';

	public function __construct(Client $client, $uri)
	{
		parent::__construct($uri, self::ENDPOINT, $client);
	}

	public function subscribe($list_id, $body)
	{
		$headers = [
			'Content-Type' => 'application/json'
		];

		$request = new Request('POST', $this->endpoint . "/{$list_id}/subscribe", [
			'headers' => $headers,
			'connect_timeout' => 30,
			'timeout' => 30
		], $body);

		return $this->client->send($request);
	}
}