<?php
	namespace mrvpetrov\Http;

	enum HttpMethodEnum: string {
		case GET = 'GET';
		case POST = 'POST';
		case PUT = 'PUT';
		case DELETE = 'DELETE';

		case OPTIONS = 'OPTIONS';
		case PATCH = 'PATCH';

		case HEAD = 'HEAD';
		case TRACE = 'TRACE';
		case CONNECT = 'CONNECT';
	}
