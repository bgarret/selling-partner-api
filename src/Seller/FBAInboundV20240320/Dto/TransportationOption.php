<?php

declare(strict_types=1);

namespace SellingPartnerApi\Seller\FBAInboundV20240320\Dto;

use SellingPartnerApi\Dto;

final class TransportationOption extends Dto
{
    /**
     * @param  Carrier  $carrier  The carrier for the inbound shipment.
     * @param  string[]  $preconditions  Identifies a list of preconditions for confirming the transportation option.
     * @param  string  $shipmentId  Identifier of a shipment. A shipment contains the boxes and units being inbounded.
     * @param  string  $shippingMode  Mode of shipment transportation that this option will provide. Can be: `GROUND_SMALL_PARCEL`, `FREIGHT_LTL`, `FREIGHT_FTL_PALLET`, `FREIGHT_FTL_NONPALLET`, `OCEAN_LCL`, `OCEAN_FCL`, `AIR_SMALL_PARCEL`, `AIR_SMALL_PARCEL_EXPRESS`.
     * @param  string  $shippingSolution  Shipping program for the option. Can be: `AMAZON_PARTNERED_CARRIER`, `USE_YOUR_OWN_CARRIER`.
     * @param  string  $transportationOptionId  Identifier of a transportation option. A transportation option represent one option for how to send a shipment.
     * @param  ?CarrierAppointment  $carrierAppointment  Contains details for a transportation carrier appointment. This appointment is vended out by Amazon and is an indicator for when a transportation carrier is accepting shipments to be picked up.
     * @param  ?Quote  $quote  The estimated shipping cost associated with the transportation option.
     */
    public function __construct(
        public readonly Carrier $carrier,
        public readonly array $preconditions,
        public readonly string $shipmentId,
        public readonly string $shippingMode,
        public readonly string $shippingSolution,
        public readonly string $transportationOptionId,
        public readonly ?CarrierAppointment $carrierAppointment = null,
        public readonly ?Quote $quote = null,
    ) {
    }
}
