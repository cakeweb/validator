<?php

namespace CakeWeb\Validator;

/**
 * Verifica se um array possui ao menos {{min}} itens
 */
class AtLeast extends Validator
{
	protected $defaultOptions = [
		'min' => 2,
		'notArray' => 'O valor {{value}} deveria ser um array.',
		'lessThan' => 'Selecione pelo menos {{min}} valores.'
	];

	protected function validate($value)
	{
		if(!is_array($value))
		{
			return $this->addMessage($this->options['notArray']);
		}

		if(count(array_filter($value)) < $this->options['min'])
		{
			return $this->addMessage($this->options['lessThan']);
		}
	}
}