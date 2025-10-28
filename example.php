<?php

require __DIR__ . '/vendor/autoload.php';

use App\Data\Order;
use App\Data\SimpleBuyer;
use App\Fulfillment\MockFbaClient;
use App\Service\FbaShippingService;

$orderId = 16400; // matches mock/order.16400.json
$buyerJson = __DIR__ . '/mock/buyer.29664.json';
$buyerData = json_decode(file_get_contents($buyerJson), true) ?: [];

$order = new Order($orderId);
$order->load();

$buyer = new SimpleBuyer($buyerData);

$service = new FbaShippingService(new MockFbaClient());
$tracking = $service->ship($order, $buyer);

echo $tracking . PHP_EOL;
