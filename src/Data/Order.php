<?php

namespace App\Data;

class Order extends AbstractOrder
{
	protected function loadOrderData(int $id): array
	{
		$path = __DIR__ . '/../../mock/order.' . $id . '.json';
		if (!is_file($path)) {
			return [];
		}
		$raw = file_get_contents($path) ?: '';
		return json_decode($raw, true) ?: [];
	}
}
