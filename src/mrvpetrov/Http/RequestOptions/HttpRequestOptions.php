<?php

	namespace mrvpetrov\Http\RequestOptions;

	use GuzzleHttp\Cookie\CookieJarInterface;
	use Psr\Http\Message\StreamInterface;

	class HttpRequestOptions {
		/**
		 * Request body
		 * @var string|StreamInterface|null
		 */
		public string|StreamInterface|null $body = null;

		public ?HttpJson $json = null;

		/** @var HttpHeaderList|null */
		public HttpHeaderList|null $headers = null;

		/**
		 * Request cookies
		 * @var CookieJarInterface|null
		 */
		public ?CookieJarInterface $cookies = null;


		/**
		 * Request ssl certificate
		 * @var HttpRequestCertificate|null
		 */
		public ?HttpRequestCertificate $certificate = null;

		/**
		 * Float describing the number of seconds to wait while trying to connect to a server. Use 0 to wait indefinitely (the default behavior).
		 * @var float|null
		 */
		public ?float $connectionTimeout = null;

		/**
		 * Specify whether or not Content-Encoding responses (gzip, deflate, etc.) are automatically decoded.
		 * @var bool|null
		 */
		public ?bool $decodeContent = null;

		/**
		 * The number of milliseconds to delay before sending the request.
		 * @var int|float|null
		 */
		public int|float|null $delay = null;

		/**
		 * Describes the SSL certificate verification behavior of a request.
		 *  - Set to true to enable SSL certificate verification and use the default CA bundle provided by operating system.
		 *  - Set to false to disable certificate verification (this is insecure!).
		 *  - Set to a string to provide the path to a CA bundle to enable verification using a custom certificate.
		 *
		 * @var bool|string|null
		 */
		public bool|string|null $verify = null;

		public function getOptionsAsArray(): array {
			$_options = [];
			if(!empty($this->json)) $_options['json'] = $this->json;
			if(!empty($this->body)) $_options['body'] = $this->body;
			if(!empty($this->cookies)) $_options['cookies'] = $this->cookies;
			if(!empty($this->headers)) $_options['headers'] = $this->headers->asArray();
			if(!empty($this->verify)) $_options['verify'] = $this->verify;

			return $_options;
		}
	}