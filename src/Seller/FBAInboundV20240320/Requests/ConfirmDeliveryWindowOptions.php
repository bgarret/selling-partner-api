<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FBAInboundV20240320\Requests;

use Exception;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\FBAInboundV20240320\Responses\ConfirmDeliveryWindowOptionsResponse;
use SellingPartnerApi\Seller\FBAInboundV20240320\Responses\ErrorList;

/**
 * confirmDeliveryWindowOptions
 */
class ConfirmDeliveryWindowOptions extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  string  $inboundPlanId  Identifier of an inbound plan.
     * @param  string  $shipmentId  The shipment to confirm the delivery window option for.
     * @param  string  $deliveryWindowOptionId  The id of the delivery window option to be confirmed.
     */
    public function __construct(
        protected string $inboundPlanId,
        protected string $shipmentId,
        protected string $deliveryWindowOptionId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/inbound/fba/2024-03-20/inboundPlans/{$this->inboundPlanId}/shipments/{$this->shipmentId}/deliveryWindowOptions/{$this->deliveryWindowOptionId}/confirmation";
    }

    public function createDtoFromResponse(Response $response): ConfirmDeliveryWindowOptionsResponse|ErrorList
    {
        $status = $response->status();
        $responseCls = match ($status) {
            202 => ConfirmDeliveryWindowOptionsResponse::class,
            400, 404, 500, 403, 413, 415, 429, 503 => ErrorList::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json(), $responseCls);
    }
}
