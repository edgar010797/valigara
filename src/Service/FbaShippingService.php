<?php

namespace App\Service;

use App\Data\AbstractOrder;
use App\Data\BuyerInterface;
use App\ShippingServiceInterface;
use App\Fulfillment\FbaClientInterface;
use RuntimeException;

class FbaShippingService implements ShippingServiceInterface
{

	private FbaClientInterface $fbaClient;

	public function __construct(FbaClientInterface $fbaClient)
	{
		$this->fbaClient = $fbaClient;
	}

	public function ship(AbstractOrder $order, BuyerInterface $buyer): string
	{
		try {
			$trackingNumber = $this->fbaClient->createFulfillmentOrderAndGetTracking(
				$order->getOrderId(),
				$buyer
			);
		} catch (\Throwable $e) {
			throw new RuntimeException('Unable to ship order via FBA: ' . $e->getMessage(), 0, $e);
		}

		if (!is_string($trackingNumber) || $trackingNumber === '') {
			throw new RuntimeException('FBA did not return a valid tracking number');
		}

		return $trackingNumber;
	}
}
