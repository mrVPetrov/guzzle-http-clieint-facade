<?php

	namespace mrvpetrov\Http\RequestOptions;

	use GuzzleHttp\Cookie\CookieJarInterface;
	use Psr\Http\Message\StreamInterface;

	class HttpRequestOptions {
		public static function new(): self {
			return new self();
		}

		/**
		 * Request body
		 * @var string|StreamInterface|null
		 */
		public string|StreamInterface|null $body = null;
		public function setBody(string|StreamInterface|null $body): self {
			$this->body = $body;
			return $this;
		}

		public ?HttpJson $json = null;
		public function setJson(HttpJson $json): self {
			$this->json = $json;
			return $this;
		}

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


		public function getOptionsAsArray(): array {
			$_options = [];
			if(!empty($this->json)) $_options['json'] = $this->json;
			if(!empty($this->body)) $_options['body'] = $this->body;
			if(!empty($this->cookies)) $_options['cookies'] = $this->cookies;
			if(!empty($this->headers)) $_options['headers'] = $this->headers->asArray();

			return $_options;
		}
	}