<?php

	namespace mrvpetrov\Http\RequestOptions;

	class HttpJson {
		private ?array $_jsonArray = null;
		function get(): array {
			return $this->_jsonArray;
		}

		private function __construct() {}
		static function fromString(string $json): HttpJson {
			$_json = new HttpJson();
			$_json->_jsonArray = json_decode($json, true);
			return $_json;
		}

		static function fromArray(array $json): HttpJson {
			$_json = new HttpJson();
			$_json->_jsonArray = $json;
			return $_json;
		}
	}