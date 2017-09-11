<?php

namespace CakeWeb\Validator;

/**
 * Validador para Cadastro de Pessoas
 *
 * Implementação de algoritmos para cadastro de pessoas físicas e jurídicas
 * conforme Ministério da Fazenda do Governo Federal.
 *
 * @author Wanderson Henrique Camargo Rosa
 */
abstract class Documento extends Validator
{
	/**
	 * Modelos de mensagens
	 * @var string
	 */
	protected $defaultOptions = [
		'size'     => "'{{value}}' não possui tamanho esperado.",
		'expanded' => "'{{value}}' não possui um formato aceitável.",
		'digit'    => "'{{value}}' não é um documento válido."
	];

	/**
	 * Tamanho do campo
	 * @var int
	 */
	protected $_size = 0;

	/**
	 * Modificadores de dígitos
	 * @var array
	 */
	protected $_modifiers = [];

	/**
	* Validação interna do documento
	* @param string $value Dados para validação
	* @return boolean Confirmação de documento válido
	*/
	protected function _check($value)
	{
		// Captura dos modificadores
		foreach($this->_modifiers as $modifier)
		{
			$result = 0; // Resultado inicial
			$size = count($modifier); // Tamanho dos modificadores
			for($i = 0; $i < $size; $i++)
			{
				$result += $value[$i] * $modifier[$i]; // Somatório
			}
			$result = $result % 11;
			$digit  = ($result < 2 ? 0 : 11 - $result); // Dígito
			// Verificação
			if($value[$size] != $digit)
			{
				return false;
			}
		}
		return true;
	}

	protected function validate($value)
	{
		// Filtro de dados
		$data = preg_replace('/[^0-9]/', '', $value);

		// Verificação de tamanho
		if(strlen($data) != $this->_size)
		{
			return $this->addMessage($this->options['size']);
		}

		// Verificação de dígitos expandidos
		if(str_repeat($data[0], $this->_size) == $data)
		{
			return $this->addMessage($this->options['expanded']);
		}

		// Verificação de dígitos
		if(!$this->_check($data))
		{
			return $this->addMessage($this->options['digit']);
		}
	}
}