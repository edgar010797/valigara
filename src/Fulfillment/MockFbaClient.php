<?php

namespace App\Fulfillment;

use App\Data\BuyerInterface;

class MockFbaClient implements FbaClientInterface
{
	public function createFulfillmentOrderAndGetTracking(int $orderId, BuyerInterface $buyer): string
	{
		$country = $buyer['country_code'] ?? 'US';
		$hash = substr(hash('sha256', $orderId . '|' . $country), 0, 12);
		return 'FBA' . strtoupper($country) . '-' . strtoupper($hash);
	}
}
