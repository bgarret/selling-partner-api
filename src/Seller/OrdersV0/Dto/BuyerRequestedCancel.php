<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\OrdersV0\Dto;

use SellingPartnerApi\Dto;

final class BuyerRequestedCancel extends Dto
{
    protected static array $attributeMap = [
        'isBuyerRequestedCancel' => 'IsBuyerRequestedCancel',
        'buyerCancelReason' => 'BuyerCancelReason',
    ];

    /**
     * @param  ?string  $isBuyerRequestedCancel  Indicate whether the buyer has requested cancellation.
     *
     * **Possible Values**: `true`, `false`.
     * @param  ?string  $buyerCancelReason  The reason that the buyer requested cancellation.
     */
    public function __construct(
        public readonly ?string $isBuyerRequestedCancel = null,
        public readonly ?string $buyerCancelReason = null,
    ) {
    }
}
