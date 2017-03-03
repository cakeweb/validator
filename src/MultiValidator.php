<?php

namespace CakeWeb\Validator;

final class MultiValidator implements ValidatorInterface
{
	private $breakChainOnFailure;
	private $validators = [];
	private $messages = [];

	public function __construct(bool $breakChainOnFailure = false)
	{
		$this->breakChainOnFailure = $breakChainOnFailure;
	}

	public function addValidator(ValidatorInterface $validator)
	{
		$this->validators[] = $validator;
		return $this;
	}

	public function isValid($value): bool
	{
		foreach($this->validators as $validator)
		{
			if(!$validator->isValid($value))
			{
				$this->messages = array_merge($this->messages, $validator->getMessages());
				if($this->breakChainOnFailure)
				{
					break;
				}
			}
		}
		return empty($this->messages);
	}

	public function getMessages(): array
	{
		return $this->messages;
	}
}