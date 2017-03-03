<?php

namespace CakeWeb;

interface ValidatorInterface
{
	public function isValid($value): bool;
	public function getMessages(): array;
}