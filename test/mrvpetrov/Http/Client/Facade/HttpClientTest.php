<?php

	namespace mrvpetrov\tests\Http\Client\Facade;

	use mrvpetrov\Http\Client\Facade\HttpClient;
	use mrvpetrov\Http\Client\Facade\HttpClientOptions;
	use mrvpetrov\Http\Client\Facade\HttpHeader;
	use mrvpetrov\Http\RequestOptions\HttpJson;
	use mrvpetrov\Http\RequestOptions\HttpRequestOptions;
	use PHPUnit\Framework\TestCase;
	use function PHPUnit\Framework\assertEquals;

	class HttpClientTest extends TestCase {
		function test_request() {
			$client = new HttpClient(
				HttpClientOptions::new()
				->setBaseUri('https://jsonplaceholder.typicode.com/')
				->addHeader(new HttpHeader("test", 'value'))
				->setVerify(false)
			);

			$res = $client->get( 'posts');

			$json = json_decode($res->getBody()->getContents(), true);

			assertEquals(200, $res->getStatusCode());
			self::assertCount(100, $json);
		}

		function test_json_request() {
			$client = new HttpClient(
				HttpClientOptions::new()
				->setBaseUri('https://jsonplaceholder.typicode.com/')
				->addHeader(new HttpHeader("test", 'value'))
				->setVerify(false)
			);

			$options = HttpRequestOptions::new()->setJson(HttpJson::fromArray(['UserId' => 1, 'title' => 'test title', 'body' => 'test body']));
			$res = $client->post( 'posts', $options);

			$json = json_decode($res->getBody()->getContents(), true);

			assertEquals(201, $res->getStatusCode());
			assertEquals(101, $json['id']);
		}
	}
