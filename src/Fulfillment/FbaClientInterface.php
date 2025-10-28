<?php

namespace App\Fulfillment;

use App\Data\BuyerInterface;

interface FbaClientInterface
{
	/**
	 * Creates fulfillment order via Amazon SP-API and returns tracking number.
	 */
	public function createFulfillmentOrderAndGetTracking(int $orderId, BuyerInterface $buyer): string;
}
