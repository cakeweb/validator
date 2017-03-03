<?php

namespace CakeWeb\Validator;

class IsArray extends Validator
{
	protected $defaultOptions = [
		'notArray' => 'O valor {{value}} deveria ser um array.'
	];

	protected function validate($value)
	{
		if(!is_array($value))
		{
			return $this->addMessage($this->options['notArray']);
		}
	}
}