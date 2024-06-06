<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\ProductPricingV20220501\Dto;

use SellingPartnerApi\Dto;

final class LowestPricedOffersInput extends Dto
{
    /**
     * @param  string  $itemCondition  The condition of the item.
     * @param  string  $offerType  The type of offers requested for the `LowestPricedOffers`. The `offerType` options are `Consumer` or `Business`. The default `offerType` is `Consumer`.
     */
    public function __construct(
        public readonly string $itemCondition,
        public readonly string $offerType,
    ) {
    }
}
