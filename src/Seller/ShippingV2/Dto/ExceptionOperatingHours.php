<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\ShippingV2\Dto;

use SellingPartnerApi\Dto;

final class ExceptionOperatingHours extends Dto
{
    /**
     * @param  ?DateRange  $dateRange  Date Range for query the results.
     * @param  ?OperatingHours  $operatingHours  The hours in which the access point shall remain operational
     */
    public function __construct(
        public readonly ?DateRange $dateRange = null,
        public readonly ?OperatingHours $operatingHours = null,
    ) {
    }
}
