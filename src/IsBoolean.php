<?php

namespace CakeWeb\Validator;

class IsBoolean extends Validator
{
	protected $defaultOptions = [
		'notBoolean' => 'O valor {{value}} deveria ser um boolean.'
	];

	protected function validate($value)
	{
		if(!is_bool($value))
		{
			return $this->addMessage($this->options['notBoolean']);
		}
	}
}