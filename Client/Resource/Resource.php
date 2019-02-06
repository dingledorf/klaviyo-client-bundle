<?php

namespace Rove\KlaviyoClientBundle\Client\Resource;


use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

class Resource
{
    protected $uri;
    protected $endpoint;
    protected $client;
    protected $defaultOptions;

    public function __construct($uri, $endpoint, Client $client)
    {
        $this->uri = $uri;
        $this->endpoint = $endpoint;
        $this->client = $client;
        $this->defaultOptions = [
			'connect_timeout' => 30,
			'timeout' => 30
		];
    }

    public function create($body)
    {
        $headers = [
            'Content-Type' => 'application/json'
        ];

        $request = new Request('POST', $this->endpoint, $headers, $body);

        return $this->client->send($request, $this->defaultOptions);
    }

	public function get($params) {
		$headers = [

		];

		$request = new Request('GET', $this->endpoint . '?' . http_build_query($params), $headers);

		return $this->client->send($request, $this->defaultOptions);
	}

    public function read($id) {
        $headers = [

        ];

        $request = new Request('GET', $this->endpoint . '/' . $id, $headers);

        return $this->client->send($request, $this->defaultOptions);
    }

    public function update($id, $body) {
        $headers = [
            'Content-Type' => 'application/json'
        ];

        $request = new Request('PUT', $this->endpoint . '/' . $id, $headers, $body);

        return $this->client->send($request, $this->defaultOptions);
    }

    public function delete($id) {
        $headers = [
            'Content-Type' => 'application/json'
        ];

        $request = new Request('DELETE', $this->endpoint . '/' . $id, $headers);

        return $this->client->send($request, $this->defaultOptions);
    }
}