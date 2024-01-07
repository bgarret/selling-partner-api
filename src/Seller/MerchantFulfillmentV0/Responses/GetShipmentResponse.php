<?php

namespace SellingPartnerApi\Seller\MerchantFulfillmentV0\Responses;

use Crescat\SaloonSdkGenerator\BaseResponse;
use SellingPartnerApi\Seller\MerchantFulfillmentV0\Dto\Shipment;

final class GetShipmentResponse extends BaseResponse
{
    /**
     * @param  Shipment  $payload The details of a shipment, including the shipment status.
     * @param  Error[]  $errors A list of error responses returned when a request is unsuccessful.
     */
    public function __construct(
        public readonly Shipment $payload,
        public readonly array $errors,
    ) {
    }
}