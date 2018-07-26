<?php

namespace bigpaulie\banggood\Request;

use bigpaulie\banggood\Interfaces\Arrayable;
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
class ImportOrderRequest implements RequestInterface, Arrayable
{
    /**
     * Active token , from GetAccessToken API
     * @var string $accessToken
     *
     * @Type("string")
     * @SerializedName("access_token")
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
     * @var array $productList
     */
    public $productList;

    /**
     * @var string
     *
     * @Type("string")
     */
    public $currency;

    /**
     * @var string
     *
     * @Type("string")
     */
    public $lang;

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

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'access_token' => $this->accessToken,
            'sale_record_id' => $this->saleRecordId,
            'delivery_name' => $this->deliveryName,
            'delivery_country' => $this->deliveryCountry,
            'delivery_state' => $this->deliveryState,
            'delivery_city' => $this->deliveryCity,
            'delivery_street_address' => $this->deliveryStreetAddress,
            'delivery_street_address2' => $this->deliveryStreetAddress2,
            'delivery_postcode' => $this->deliveryPostCode,
            'delivery_telephone' => $this->deliveryTelephone,
            'product_total' => $this->productTotal,
            'product_list' => $this->productList,
            'currency' => $this->currency,
            'lang' => $this->lang
        ];
    }
}