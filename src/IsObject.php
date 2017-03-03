<?php

namespace CakeWeb\Validator;

class IsObject extends Validator
{
	protected $defaultOptions = [
		'notObject' => 'O valor {{value}} deveria ser um objeto.'
	];

	protected function validate($value)
	{
		if(!is_object($value))
		{
			return $this->addMessage($this->options['notObject']);
		}
	}
}