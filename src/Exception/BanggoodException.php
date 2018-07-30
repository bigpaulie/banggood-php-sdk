<?php

namespace bigpaulie\banggood\Exception;

use bigpaulie\banggood\Interfaces\RequestInterface;
use bigpaulie\banggood\Interfaces\ResponseInterface;

/**
 * Class BanggoodException
 * @package bigpaulie\banggood\Exception
 */
class BanggoodException extends \Exception
{
    /**
     * @var RequestInterface
     */
    private $request;

    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * BanggoodException constructor.
     * @param string $message
     * @param int $code
     * @param null $previous
     * @param RequestInterface $request
     * @param ResponseInterface $response
     */
    public function __construct(
        string $message,
        int $code = 0,
        $previous = null,
        RequestInterface $request = null,
        ResponseInterface $response = null
    )
    {
        parent::__construct($message, $code, $previous);
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @return RequestInterface|null
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * @return ResponseInterface|null
     */
    public function getResponse()
    {
        return $this->response;
    }
}