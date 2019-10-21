<?php

namespace Goosfraba\ViesEuVatChecker;

final class CheckVatRequest
{
    /** @var string */
    private $countryCode;

    /** @var string */
    private $vatNumber;

    /**
     * @param string $countryCode Two letters ISO country code
     * @param string $vatNumber VAT number
     */
    public function __construct($countryCode, $vatNumber)
    {
        $this->countryCode = strtoupper($countryCode);
        $this->vatNumber = preg_replace('/[^0-9A-Za-z\+\*\.]/', '', $vatNumber);
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
}
