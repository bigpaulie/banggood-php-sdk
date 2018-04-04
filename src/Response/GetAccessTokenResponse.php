<?php

namespace bigpaulie\banggood\Response;

use JMS\Serializer\Annotation\Type;
use JMS\Serializer\Annotation\SerializedName;

class GetAccessTokenResponse extends BaseResponse
{
    /**
     * Active token , 64-512 byte
     * @var string $accessToken
     *
     * @SerializedName("access_token")
     * @Type("string")
     */
    public $accessToken;

    /**
     * Active time（the unit is second)
     * @var int $expresIn
     *
     * @SerializedName("expires_in")
     * @Type("int")
     */
    public $expresIn;
}