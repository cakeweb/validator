<?php

namespace CakeWeb\Validator;

class NotEmpty extends Validator
{
	protected $defaultOptions = [
		'empty' => 'O valor é obrigatório.'
	];

	protected function validate($value)
	{
		if(empty($value))
		{
			$this->addMessage($this->options['empty']);
		}
	}
}