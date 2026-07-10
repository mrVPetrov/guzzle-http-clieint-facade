<?php

	namespace mrvpetrov\Http\Client\Facade;

	class HttpHeader {
		public string $name;
		public string|array $value;

		public function __construct(string $name, string|array $value) {
			$this->name = $name;
			$this->value = $value;
		}
	}