<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FBAInboundV20240320\Requests;

use Exception;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use SellingPartnerApi\EmptyResponse;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\FBAInboundV20240320\Dto\UpdateShipmentNameRequest;
use SellingPartnerApi\Seller\FBAInboundV20240320\Responses\ErrorList;

/**
 * updateShipmentName
 */
class UpdateShipmentName extends Request
{
    protected Method $method = Method::PUT;

    /**
     * @param  string  $inboundPlanId  Identifier of an inbound plan.
     * @param  string  $shipmentId  Identifier of a shipment. A shipment contains the boxes and units being inbounded.
     * @param  UpdateShipmentNameRequest  $updateShipmentNameRequest  The `updateShipmentName` request.
     */
    public function __construct(
        protected string $inboundPlanId,
        protected string $shipmentId,
        public UpdateShipmentNameRequest $updateShipmentNameRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/inbound/fba/2024-03-20/inboundPlans/{$this->inboundPlanId}/shipments/{$this->shipmentId}/name";
    }

    public function createDtoFromResponse(Response $response): EmptyResponse|ErrorList
    {
        $status = $response->status();
        $responseCls = match ($status) {
            204 => EmptyResponse::class,
            400, 404, 500, 403, 413, 415, 429, 503 => ErrorList::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json(), $responseCls);
    }

    public function defaultBody(): array
    {
        return $this->updateShipmentNameRequest->toArray();
    }
}
