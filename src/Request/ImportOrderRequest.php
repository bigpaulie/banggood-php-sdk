<?php

namespace bigpaulie\banggood\Request;

use bigpaulie\banggood\Interfaces\RequestInterface;
use bigpaulie\banggood\Object\Order\ProductList;
use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

/**
 * Class ImportOrderRequest
 * API is the special treatment to synchronize user order information to the Banggood,
 * namely the user delivery address and products.
 *
 * @package bigpaulie\banggood\Request
 */
class ImportOrderRequest implements RequestInterface
{
    /**
     * Active token , from GetAccessToken API
     * @var string $accessToken
     *
     * @Type("string")
     * @SerializedName("Access_token")
     */
    public $accessToken;

    /**
     * Unqiue identifier of order in your shop
     * @var string $saleRecordId
     *
     * @Type("string")
     * @SerializedName("sale_record_id")
     */
    public $saleRecordId;

    /**
     * Buyer full name
     * @var string $deliveryName
     *
     * @Type("string")
     * @SerializedName("delivery_name")
     */
    public $deliveryName;

    /**
     * Receiving country , and you can get the spelling of this field values from GetCountries API
     * @var string $deliveryCountry
     *
     * @Type("string")
     * @SerializedName("delivery_country")
     */
    public $deliveryCountry;

    /**
     * State / Province / Region
     * @var string $deliveryState
     *
     * @Type("string")
     * @SerializedName("delivery_state")
     */
    public $deliveryState;

    /**
     * Receiving City
     * @var string $deliveryCity
     *
     * @Type("string")
     * @SerializedName("delivery_city")
     */
    public $deliveryCity;

    /**
     * Receiving address
     * @var string $deliveryStreetAddress
     *
     * @Type("string")
     * @SerializedName("delivery_street_address")
     */
    public $deliveryStreetAddress;

    /**
     * Receiving address (Optional)
     * @var string $deliveryStreetAddress2
     *
     * @Type("string")
     * @SerializedName("delivery_street_address2")
     */
    public $deliveryStreetAddress2;

    /**
     * ZIP / Post Code
     * @var string $deliveryPostCode
     *
     * @Type("string")
     * @SerializedName("delivery_postcode")
     */
    public $deliveryPostCode;

    /**
     * User telephone(For shipping service)
     * @var string $deliveryTelephone
     *
     * @Type("string")
     * @SerializedName("delivery_telephone")
     */
    public $deliveryTelephone;

    /**
     * Total number of products in this order
     * @var int $productTotal
     *
     * @Type("integer")
     * @SerializedName("product_total")
     */
    public $productTotal;

    /**
     * Detail of product user bought
     * @var ProductList[] $productList
     *
     * @Type("array<bigpaulie\banggood\Object\Order\ProductList>")
     * @SerializedName("product_list")
     */
    public $productList;

    /**
     * ImportOrderRequest constructor.
     * @param string $accessToken
     */
    public function __construct(string $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Not used in this context.
     * @return array
     */
    public function getParameters(): array
    {
        return [];
    }
}