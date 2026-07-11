<?php

	namespace mrvpetrov\tests\Http\Client\Facade;

	use mrvpetrov\Http\Client\Facade\HttpClient;
	use mrvpetrov\Http\Client\Facade\HttpClientOptions;
	use mrvpetrov\Http\Client\Facade\HttpHeader;
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
	}
