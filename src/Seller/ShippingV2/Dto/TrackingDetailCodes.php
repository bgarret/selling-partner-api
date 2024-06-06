<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\ShippingV2\Dto;

use SellingPartnerApi\Dto;

final class TrackingDetailCodes extends Dto
{
    /**
     * @param  string[]  $forward  Contains detail codes that provide additional details related to the forward leg of the shipment.
     * @param  string[]  $returns  Contains detail codes that provide additional details related to the return leg of the shipment.
     */
    public function __construct(
        public readonly array $forward,
        public readonly array $returns,
    ) {
    }
}
