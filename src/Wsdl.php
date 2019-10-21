<?php

namespace Goosfraba\ViesEuVatChecker;

final class Wsdl
{
    /** @var string string */
    private $wsdl;

    private function __construct($wsdl)
    {
        $this->wsdl = $wsdl;
    }

    /**
     * Returns production WSDL file location
     *
     * @return Wsdl
     */
    public static function production()
    {
        return new self('http://ec.europa.eu/taxation_customs/vies/checkVatService.wsdl');
    }

    /**
     * Returns test WSDL file location
     *
     * @return Wsdl
     */
    public static function test()
    {
        return new self('http://ec.europa.eu/taxation_customs/vies/checkVatTestService.wsdl');
    }

    /**
     * Creates custom WSDL file location
     *
     * @param string $wsdl
     * @return Wsdl
     */
    public static function any($wsdl)
    {
        return new self($wsdl);
    }

    /**
     * @inheritDoc
     */
    public function __toString()
    {
        return $this->wsdl;
    }
}
