<?php
namespace bigc\profile\component;

class ValidProfile {
	private $_rules = [
		'id'	=>	[
			'type'	=>	'numeric',
			'regex'	=>	'/[0-9]+/'
		],
		'name'	=>	[
			'type'	=>	'string',
			'regex'	=>	'/[a-zA-Z]+/'
		],
	];

	public function checkId($id) {
		return $this->_checkValid($id, $this->_rules['id']);
	}

	public function checkData($data) {
		try {
			return $this->_checkValid($data['name'], $this->_rules['name']);
		} catch (Exception $e) {
			throw new $e;
		}
	}

	private function _checkValid($data, $pattern) {
		//Check type
		switch ($pattern['type']) {
			case 'numeric':
				if(!is_numeric($data)) {
					throw new \InvalidArgumentException('Should be numeric', -32602);
				}
				break;
			case 'string':
				if(!is_string($data)) {
					throw new \InvalidArgumentException("${data} should be string", -32602);
				}
				break;
			default:
				throw new \InvalidArgumentException('Pattern not defined', -32602);
				break;
		}

		//Check regex
		if(!preg_match($pattern['regex'], $data)) {
			throw new \InvalidArgumentException("Should be match ${pattern['regex']}", -32602);
		}

		return true;
	}
}