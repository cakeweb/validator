<?php

namespace CakeWeb\Validator;

/**
 * Verifica se um valor está contido em um conjunto
 */
class InArray extends Validator
{
	protected $defaultOptions = [
		'acceptedValues' => [],
		'notInArray' => 'O valor {{value}} não está entre os valores aceitos.'
	];

	protected function validate($value)
	{
		if(!in_array($value, $this->options['acceptedValues']))
		{
			return $this->addMessage($this->options['notInArray']);
		}
	}
}