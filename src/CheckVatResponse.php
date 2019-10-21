<?php

namespace Goosfraba\ViesEuVatChecker;

final class CheckVatResponse
{
    private static $EMPTY = '---';

    /** @var string */
    private $countryCode;

    /** @var string */
    private $vatNumber;

    /** @var \DateTime */
    private $requestDate;

    /** @var bool */
    private $valid;

    /** @var string */
    private $name;

    /** @var string */
    private $address;

    /**
     * @param string $countryCode
     * @param string $vatNumber
     * @param \DateTime $requestDate
     * @param bool $valid
     * @param string $name
     * @param string $address
     */
    public function __construct($countryCode, $vatNumber, \DateTime $requestDate, $valid, $name = null, $address = null)
    {
        $this->countryCode = (string)$countryCode;
        $this->vatNumber = (string)$vatNumber;
        $this->requestDate = $requestDate;
        $this->valid = (bool)$valid;
        $this->name = $name === self::$EMPTY || $name === null ? null : $name;
        $this->address = $address === self::$EMPTY || $address === null ? null : $address;
    }

    /**
     * @return string
     */
    public function countryCode()
    {
        return $this->countryCode;
    }

    /**
     * @return string
     */
    public function vatNumber()
    {
        return $this->vatNumber;
    }

    /**
     * @return \DateTime
     */
    public function requestDate()
    {
        return $this->requestDate;
    }

    /**
     * @return bool
     */
    public function isValid()
    {
        return $this->valid;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function address()
    {
        return $this->address;
    }
}
