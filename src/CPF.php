<?php

namespace CakeWeb\Validator;

class CPF extends Documento
{
	/**
	 * Tamanho do campo
	 * @var int
	 */
	protected $_size = 11;

	/**
	 * Modificadores de dígitos
	 * @var array
	 */
	protected $_modifiers = [
		[10,9,8,7,6,5,4,3,2],
		[11,10,9,8,7,6,5,4,3,2]
	];
}