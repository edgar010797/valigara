## FBA Shipping Service (Demo)

Implements `App\\ShippingServiceInterface` via `App\\Service\\FbaShippingService`.
Uses a mock SP-API client to simulate creating an FBA fulfillment order and returning a tracking number.

### Run locally

1. Install dependencies and dump autoload:

```bash
composer install && composer dump-autoload
```

2. Execute the example script:

```bash
php example.php
```

It will load `mock/order.16400.json` and `mock/buyer.29664.json`, invoke the service, and print a mock tracking number like `FBAUS-...`.

### Notes

- `App\\Fulfillment\\MockFbaClient` is a stand-in for the Amazon SP-API FBA Outbound client. In a real project, replace it with an implementation that calls SP-API per `https://developer-docs.amazon.com/sp-api`.
