<?php

	namespace mrvpetrov\tests\Http\Client\Facade;

	use mrvpetrov\Http\Client\Facade\HttpClient;
	use mrvpetrov\Http\Client\Facade\HttpClientOptions;
	use PHPUnit\Framework\TestCase;
	use function PHPUnit\Framework\assertEquals;

	class HttpClientTest extends TestCase {
		function test_request() {
			$client = new HttpClient(
				HttpClientOptions::new()
					->setBaseUri('https://jsonplaceholder.typicode.com/')
			);

			$res = $client->get( 'posts');

			$json = json_decode($res->getBody()->getContents(), true);

			assertEquals(200, $res->getStatusCode());
			self::assertCount(100, $json);
		}
	}
