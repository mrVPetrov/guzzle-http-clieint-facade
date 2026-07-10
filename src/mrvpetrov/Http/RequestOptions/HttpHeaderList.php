<?php

	namespace mrvpetrov\Http\RequestOptions;

	use ReturnTypeWillChange;

	class HttpHeaderList extends \ArrayIterator {
		/**
		 * @param HttpHeader $value
		 * @return HttpHeaderList
		 */
		#[ReturnTypeWillChange]
		public function append(mixed $value): self {
			parent::append($value);
			return $this;
		}

		public function current(): HttpHeader {
			return parent::current();
		}

		public function asArray(): array {
			$_headers = [];
			foreach ($this as $value) {
				$_headers[$value->name] = $value->value;
			}

			return $_headers;
		}
	}