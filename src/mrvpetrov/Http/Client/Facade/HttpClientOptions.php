<?php

	namespace mrvpetrov\Http\Client\Facade;

	class HttpClientOptions {
		public static function new(): HttpClientOptions {
			return new HttpClientOptions();
		}

		public ?string $baseUri = null;
		public function setBaseUri(?string $baseUri): self {
			$this->baseUri = $baseUri;
			return $this;
		}

		public ?int $timeout = null;
		public ?int $connectTimeout = null;
		public ?HttpHeaderList $headers = null;
		public bool|array|null $allowRedirects = null;

		/**
		 * Describes the SSL certificate verification behavior of a request.
		 *  - Set to true to enable SSL certificate verification and use the default CA bundle provided by operating system.
		 *  - Set to false to disable certificate verification (this is insecure!).
		 *  - Set to a string to provide the path to a CA bundle to enable verification using a custom certificate.
		 *
		 * @var bool|string|null
		 */
		public bool|string|null $verify = null;

		public function asArray(): array {
			$_options = [];
			if(!empty($this->baseUri)) $_options['base_uri'] = $this->baseUri;
			if(!empty($this->timeout)) $_options['timeout'] = $this->timeout;
			if(!empty($this->connectTimeout)) $_options['connect_timeout'] = $this->connectTimeout;
			if(!empty($this->headers)) $_options['headers'] = $this->headers->asArray();
			if(!empty($this->allowRedirects)) $_options['allow_redirects'] = $this->allowRedirects;

			return $_options;
		}
	}