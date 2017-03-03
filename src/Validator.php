<?php

namespace CakeWeb\Validator;

abstract class Validator implements ValidatorInterface
{
	protected $defaultOptions = [];
	protected $options = [];
	protected $messages = [];

	final public function __construct(array $options = [])
	{
		$this->options = array_merge($this->defaultOptions, $options);
	}

	final public function isValid($value): bool
	{
		$this->options['value'] = $value;
		$this->validate($value);
		return empty($this->messages);
	}

	final public function getMessages(): array
	{
		return $this->messages;
	}

	final protected function addMessage($message)
	{
		$this->messages[] = preg_replace_callback('/\{\{(.*?)\}\}/', function($matches) {
			return $this->options[$matches[1]];
		}, $message);
	}

	abstract protected function validate($value);
}