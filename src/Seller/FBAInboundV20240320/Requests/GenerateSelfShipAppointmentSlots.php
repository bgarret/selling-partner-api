<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FBAInboundV20240320\Requests;

use Exception;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasJsonBody;
use SellingPartnerApi\Request;
use SellingPartnerApi\Seller\FBAInboundV20240320\Dto\GenerateSelfShipAppointmentSlotsRequest;
use SellingPartnerApi\Seller\FBAInboundV20240320\Responses\ErrorList;
use SellingPartnerApi\Seller\FBAInboundV20240320\Responses\GenerateSelfShipAppointmentSlotsResponse;

/**
 * generateSelfShipAppointmentSlots
 */
class GenerateSelfShipAppointmentSlots extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    /**
     * @param  string  $inboundPlanId  Identifier of an inbound plan.
     * @param  string  $shipmentId  Identifier of a shipment. A shipment contains the boxes and units being inbounded.
     * @param  GenerateSelfShipAppointmentSlotsRequest  $generateSelfShipAppointmentSlotsRequest  The `generateSelfShipAppointmentSlots` request.
     */
    public function __construct(
        protected string $inboundPlanId,
        protected string $shipmentId,
        public GenerateSelfShipAppointmentSlotsRequest $generateSelfShipAppointmentSlotsRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return "/inbound/fba/2024-03-20/inboundPlans/{$this->inboundPlanId}/shipments/{$this->shipmentId}/selfShipAppointmentSlots";
    }

    public function createDtoFromResponse(Response $response): GenerateSelfShipAppointmentSlotsResponse|ErrorList
    {
        $status = $response->status();
        $responseCls = match ($status) {
            201 => GenerateSelfShipAppointmentSlotsResponse::class,
            400, 404, 500, 403, 413, 415, 429, 503 => ErrorList::class,
            default => throw new Exception("Unhandled response status: {$status}")
        };

        return $responseCls::deserialize($response->json(), $responseCls);
    }

    public function defaultBody(): array
    {
        return $this->generateSelfShipAppointmentSlotsRequest->toArray();
    }
}
