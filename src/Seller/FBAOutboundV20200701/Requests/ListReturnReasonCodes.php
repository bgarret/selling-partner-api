<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FBAOutboundV20200701\Requests;

use Exception;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\FBAOutboundV20200701\Responses\ListReturnReasonCodesResponse;

/**
 * listReturnReasonCodes
 */
class ListReturnReasonCodes extends Request
{
    protected Method $method = Method::GET;

    /**
     * @param  string  $sellerSku  The seller SKU for which return reason codes are required.
     * @param  ?string  $marketplaceId  The marketplace for which the seller wants return reason codes.
     * @param  ?string  $sellerFulfillmentOrderId  The identifier assigned to the item by the seller when the fulfillment order was created. The service uses this value to determine the marketplace for which the seller wants return reason codes.
     * @param  ?string  $language  The language that the `TranslatedDescription` property of the `ReasonCodeDetails` response object should be translated into.
     */
    public function __construct(
        protected string $sellerSku,
        protected ?string $marketplaceId = null,
        protected ?string $sellerFulfillmentOrderId = null,
        protected ?string $language = null,
    ) {
    }

    public function defaultQuery(): array
    {
        return array_filter([
            'sellerSku' => $this->sellerSku,
            'marketplaceId' => $this->marketplaceId,
            'sellerFulfillmentOrderId' => $this->sellerFulfillmentOrderId,
            'language' => $this->language,
        ]);
    }

    public function resolveEndpoint(): string
    {
        return '/fba/outbound/2020-07-01/returnReasonCodes';
    }

    public function createDtoFromResponse(Response $response): ListReturnReasonCodesResponse
    {
        $status = $response->status();
        $responseCls = match ($status) {
            200, 400, 401, 403, 404, 429, 500, 503 => ListReturnReasonCodesResponse::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json(), $responseCls);
    }
}
