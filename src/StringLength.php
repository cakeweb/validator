<?php

namespace CakeWeb\Validator;

class StringLength extends Validator
{
	protected $defaultOptions = [
		'min' => null,
		'max' => null,
		'lessThan' => 'O valor "{{value}}" possui menos que {{min}} caracteres.',
		'moreThan' => 'O valor "{{value}}" possui mais que {{max}} caracteres.'
	];

	protected function validate($value)
	{
		$stringLength = mb_strlen($value);

		// Valida o tamanho mínimo
		if($this->options['min'] && $stringLength < $this->options['min'])
		{
			$this->addMessage($this->options['lessThan']);
		}

		// Valida o tamanho máximo
		if($this->options['max'] && $stringLength > $this->options['max'])
		{
			$this->addMessage($this->options['moreThan']);
		}
	}
}