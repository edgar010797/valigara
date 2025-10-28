<?php

namespace App\Data;

use ArrayAccess;

class SimpleBuyer implements BuyerInterface
{
	/** @var array<string,mixed> */
	private array $data;

	/** @param array<string,mixed> $data */
	public function __construct(array $data)
	{
		$this->data = $data;
	}

	public function offsetExists($offset): bool
	{
		return array_key_exists($offset, $this->data);
	}

	public function offsetGet($offset): mixed
	{
		return $this->data[$offset] ?? null;
	}

	public function offsetSet($offset, $value): void
	{
		$this->data[$offset] = $value;
	}

	public function offsetUnset($offset): void
	{
		unset($this->data[$offset]);
	}
}
