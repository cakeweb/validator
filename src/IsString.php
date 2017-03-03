<?php

namespace CakeWeb\Validator;

class IsString extends Validator
{
	protected $defaultOptions = [
		'notString' => 'O valor {{value}} deveria ser uma string.'
	];

	protected function validate($value)
	{
		if(!is_string($value))
		{
			return $this->addMessage($this->options['notString']);
		}
	}
}