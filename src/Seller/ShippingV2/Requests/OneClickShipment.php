<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\ShippingV2\Requests;

use Exception;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\ShippingV2\Dto\OneClickShipmentRequest;
use SellingPartnerApi\Seller\ShippingV2\Responses\ErrorList;
use SellingPartnerApi\Seller\ShippingV2\Responses\OneClickShipmentResponse;

/**
 * oneClickShipment
 */
class OneClickShipment extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  OneClickShipmentRequest  $oneClickShipmentRequest  The request schema for the OneClickShipment operation. When the channelType is not Amazon, shipTo is required and when channelType is Amazon shipTo is ignored.
     */
    public function __construct(
        public OneClickShipmentRequest $oneClickShipmentRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/shipping/v2/oneClickShipment';
    }

    public function createDtoFromResponse(Response $response): OneClickShipmentResponse|ErrorList
    {
        $status = $response->status();
        $responseCls = match ($status) {
            200 => OneClickShipmentResponse::class,
            400, 401, 403, 404, 413, 415, 429, 500, 503 => ErrorList::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json(), $responseCls);
    }

    public function defaultBody(): array
    {
        return $this->oneClickShipmentRequest->toArray();
    }
}
