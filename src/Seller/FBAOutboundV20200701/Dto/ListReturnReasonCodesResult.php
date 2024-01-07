<?php

namespace SellingPartnerApi\Seller\FBAOutboundV20200701\Dto;

use Crescat\SaloonSdkGenerator\BaseDto;

final class ListReturnReasonCodesResult extends BaseDto
{
    protected static array $complexArrayTypes = ['reasonCodeDetails' => [ReasonCodeDetails::class]];

    /**
     * @param  ReasonCodeDetails[]  $reasonCodeDetails An array of return reason code details.
     */
    public function __construct(
        public readonly array $reasonCodeDetails,
        mixed ...$additionalProperties,
    ) {
        parent::__construct(...$additionalProperties);
    }
}