<?php

namespace Rove\KlaviyoClientBundle\Client;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Psr7\Request;
use Psr\Http\Message\ResponseInterface;
use Rove\KlaviyoClientBundle\Client\Resource\InventoryResource;
use Rove\KlaviyoClientBundle\Client\Resource\TrackResource;
use Rove\KlaviyoClientBundle\Client\Resource\ListResource;
use Rove\KlaviyoClientBundle\Enum\ConfigKeyEnum;
use Rove\KlaviyoClientBundle\Exception\DealerApiException;
use Rove\KlaviyoClientBundle\Exception\DeserializeException;
use Rove\KlaviyoClientBundle\Utils\SerializeHelper;
use Symfony\Component\DependencyInjection\ContainerInterface;

class KlaviyoClient
{
	public $metric;
	public $track;
	public $list;

	/**
	 * KlaviyoClient constructor.
	 */
	public function __construct()
	{
		$baseUrl = 'https://a.klaviyo.com/api/';
		$client = new Client([
			'base_uri' => $baseUrl
		], );
		$this->track = new TrackResource($client, $baseUrl);
		$this->list = new ListResource($client, $baseUrl);
	}
}