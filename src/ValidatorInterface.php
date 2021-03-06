<?php

namespace CakeWeb\Validator;

interface ValidatorInterface
{
	public function isValid($value): bool;
	public function getMessages(): array;
}