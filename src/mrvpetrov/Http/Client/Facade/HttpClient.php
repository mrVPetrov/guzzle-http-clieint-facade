<?php
	namespace mrvpetrov\Http\Client\Facade;

	use GuzzleHttp\Client;
	use GuzzleHttp\Exception\GuzzleException;
	use mrvpetrov\Http\HttpMethodEnum;
	use mrvpetrov\Http\RequestOptions\HttpRequestOptions;
	use Psr\Http\Message\ResponseInterface;

	class HttpClient {
		private Client $_client;
		public function __construct(?HttpClientOptions $options = null) {
			$this->_client = new Client($options?->asArray() ?? []);
		}

		/** @throws GuzzleException */
		public function request(HttpMethodEnum $method, string $url, ?HttpRequestOptions $options = null): ResponseInterface {
			return $this->_client->request($method->value, $url, $options?->getOptionsAsArray() ?? []);
		}

		/** @throws GuzzleException */
		public function get(string $url, ?HttpRequestOptions $options = null): ResponseInterface {
			return $this->_client->get($url, $options?->getOptionsAsArray() ?? []);
		}

		/** @throws GuzzleException */
		public function post(string $url, ?HttpRequestOptions $options = null): ResponseInterface {
			return $this->_client->post($url, $options?->getOptionsAsArray() ?? []);
		}
	}