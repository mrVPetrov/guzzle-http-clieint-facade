<?php

	namespace mrvpetrov\tests\Http\Client\Facade;

	use mrvpetrov\Http\Client\Facade\HttpClient;
	use mrvpetrov\Http\Client\Facade\HttpClientOptions;
	use mrvpetrov\Http\Client\Facade\HttpHeader;
	use mrvpetrov\Http\Client\Facade\HttpHeaderList;
	use PHPUnit\Framework\TestCase;
	use function PHPUnit\Framework\assertEquals;

	class HttpClientTest extends TestCase {
		function test_request() {
			$options = HttpClientOptions::new()->setBaseUri('https://jsonplaceholder.typicode.com/');
			$options->headers = new HttpHeaderList([new HttpHeader("test", 'value')]);
			$client = new HttpClient($options);

			$res = $client->get( 'posts');

			$json = json_decode($res->getBody()->getContents(), true);

			assertEquals(200, $res->getStatusCode());
			self::assertCount(100, $json);
		}
	}
