<?php declare(strict_types=1);
/**
 * Carton
 *
 * PHP version 7.3
 *
 * @category Class
 * @package  SellingPartnerApi
 */

/**
 * Selling Partner API for Retail Procurement Shipments
 *
 * The Selling Partner API for Retail Procurement Shipments provides programmatic access to retail shipping data for vendors.
 *
 * The version of the OpenAPI document: v1
 * 
 * Generated by: https://openapi-generator.tech
 * OpenAPI Generator version: 5.0.1
 */

/**
 * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace SellingPartnerApi\Model\VendorShippingV1;
use ArrayAccess;
use SellingPartnerApi\Model\BaseModel;
use SellingPartnerApi\Model\ModelInterface;
use SellingPartnerApi\ObjectSerializer;

/**
 * Carton Class Doc Comment
 *
 * @category Class
 * @description Details of the carton/package being shipped.
 * @package  SellingPartnerApi
 * @group 
 * @implements \ArrayAccess<TKey, TValue>
 * @template TKey int|null
 * @template TValue mixed|null  
 */
class Carton extends BaseModel implements ModelInterface, ArrayAccess, \JsonSerializable, \IteratorAggregate
{
    public const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $openAPIModelName = 'Carton';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $openAPITypes = [
        'carton_identifiers' => '\SellingPartnerApi\Model\VendorShippingV1\ContainerIdentification[]',
        'carton_sequence_number' => 'string',
        'dimensions' => '\SellingPartnerApi\Model\VendorShippingV1\Dimensions',
        'weight' => '\SellingPartnerApi\Model\VendorShippingV1\Weight',
        'tracking_number' => 'string',
        'items' => '\SellingPartnerApi\Model\VendorShippingV1\ContainerItem[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      * @phpstan-var array<string, string|null>
      * @psalm-var array<string, string|null>
      */
    protected static $openAPIFormats = [
        'carton_identifiers' => null,
        'carton_sequence_number' => null,
        'dimensions' => null,
        'weight' => null,
        'tracking_number' => null,
        'items' => null
    ];



    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'carton_identifiers' => 'cartonIdentifiers',
        'carton_sequence_number' => 'cartonSequenceNumber',
        'dimensions' => 'dimensions',
        'weight' => 'weight',
        'tracking_number' => 'trackingNumber',
        'items' => 'items'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'carton_identifiers' => 'setCartonIdentifiers',
        'carton_sequence_number' => 'setCartonSequenceNumber',
        'dimensions' => 'setDimensions',
        'weight' => 'setWeight',
        'tracking_number' => 'setTrackingNumber',
        'items' => 'setItems'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'carton_identifiers' => 'getCartonIdentifiers',
        'carton_sequence_number' => 'getCartonSequenceNumber',
        'dimensions' => 'getDimensions',
        'weight' => 'getWeight',
        'tracking_number' => 'getTrackingNumber',
        'items' => 'getItems'
    ];


    
    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['carton_identifiers'] = $data['carton_identifiers'] ?? null;
        $this->container['carton_sequence_number'] = $data['carton_sequence_number'] ?? null;
        $this->container['dimensions'] = $data['dimensions'] ?? null;
        $this->container['weight'] = $data['weight'] ?? null;
        $this->container['tracking_number'] = $data['tracking_number'] ?? null;
        $this->container['items'] = $data['items'] ?? null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['carton_sequence_number'] === null) {
            $invalidProperties[] = "'carton_sequence_number' can't be null";
        }
        if ($this->container['items'] === null) {
            $invalidProperties[] = "'items' can't be null";
        }
        return $invalidProperties;
    }


    /**
     * Gets carton_identifiers
     *
     * @return \SellingPartnerApi\Model\VendorShippingV1\ContainerIdentification[]|null
     */
    public function getCartonIdentifiers()
    {
        return $this->container['carton_identifiers'];
    }

    /**
     * Sets carton_identifiers
     *
     * @param \SellingPartnerApi\Model\VendorShippingV1\ContainerIdentification[]|null $carton_identifiers A list of carton identifiers.
     *
     * @return self
     */
    public function setCartonIdentifiers($carton_identifiers)
    {
        $this->container['carton_identifiers'] = $carton_identifiers;

        return $this;
    }
    /**
     * Gets carton_sequence_number
     *
     * @return string
     */
    public function getCartonSequenceNumber()
    {
        return $this->container['carton_sequence_number'];
    }

    /**
     * Sets carton_sequence_number
     *
     * @param string $carton_sequence_number Carton sequence number for the carton. The first carton will be 001, the second 002, and so on. This number is used as a reference to refer to this carton from the pallet level.
     *
     * @return self
     */
    public function setCartonSequenceNumber($carton_sequence_number)
    {
        $this->container['carton_sequence_number'] = $carton_sequence_number;

        return $this;
    }
    /**
     * Gets dimensions
     *
     * @return \SellingPartnerApi\Model\VendorShippingV1\Dimensions|null
     */
    public function getDimensions()
    {
        return $this->container['dimensions'];
    }

    /**
     * Sets dimensions
     *
     * @param \SellingPartnerApi\Model\VendorShippingV1\Dimensions|null $dimensions dimensions
     *
     * @return self
     */
    public function setDimensions($dimensions)
    {
        $this->container['dimensions'] = $dimensions;

        return $this;
    }
    /**
     * Gets weight
     *
     * @return \SellingPartnerApi\Model\VendorShippingV1\Weight|null
     */
    public function getWeight()
    {
        return $this->container['weight'];
    }

    /**
     * Sets weight
     *
     * @param \SellingPartnerApi\Model\VendorShippingV1\Weight|null $weight weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        $this->container['weight'] = $weight;

        return $this;
    }
    /**
     * Gets tracking_number
     *
     * @return string|null
     */
    public function getTrackingNumber()
    {
        return $this->container['tracking_number'];
    }

    /**
     * Sets tracking_number
     *
     * @param string|null $tracking_number This is required to be provided for every carton in the small parcel shipments.
     *
     * @return self
     */
    public function setTrackingNumber($tracking_number)
    {
        $this->container['tracking_number'] = $tracking_number;

        return $this;
    }
    /**
     * Gets items
     *
     * @return \SellingPartnerApi\Model\VendorShippingV1\ContainerItem[]
     */
    public function getItems()
    {
        return $this->container['items'];
    }

    /**
     * Sets items
     *
     * @param \SellingPartnerApi\Model\VendorShippingV1\ContainerItem[] $items A list of container item details.
     *
     * @return self
     */
    public function setItems($items)
    {
        $this->container['items'] = $items;

        return $this;
    }
}

