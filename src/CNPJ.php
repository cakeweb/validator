<?php

namespace CakeWeb\Validator;

class CNPJ extends Documento
{
	/**
	 * Tamanho do campo
	 * @var int
	 */
	protected $_size = 14;

	/**
	 * Modificadores de dígitos
	 * @var array
	 */
	protected $_modifiers = [
		[5,4,3,2,9,8,7,6,5,4,3,2],
		[6,5,4,3,2,9,8,7,6,5,4,3,2]
	];
}