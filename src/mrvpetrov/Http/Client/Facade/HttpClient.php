<?php
	namespace mrvpetrov\Http\Client\Facade;
	use GuzzleHttp\Client;
	use GuzzleHttp\Exception\GuzzleException;
	use mrvpetrov\Http\HttpMethodEnum;
	use mrvpetrov\Http\RequestOptions\HttpRequestOptions;
	use Psr\Http\Message\ResponseInterface;

	class HttpClient {
		private Client $_client;
		public function __construct() {
			$this->_client = new Client();
		}

		/**
		 * @throws GuzzleException
		 */
		public function request(HttpMethodEnum $method, string $url, HttpRequestOptions $options): ResponseInterface {
			return $this->_client->request($method->value, $url, $options->getOptionsAsArray());
		}
	}