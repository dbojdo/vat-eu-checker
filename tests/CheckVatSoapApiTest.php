<?php

namespace Goosfrava\ViesEuVatChecker;

use Goosfraba\ViesEuVatChecker\CheckVatRequest;
use Goosfraba\ViesEuVatChecker\CheckVatSoapApi;
use Goosfraba\ViesEuVatChecker\Wsdl;
use PHPUnit\Framework\TestCase;

class CheckVatSoapApiTest extends TestCase
{
    /** @var CheckVatSoapApi */
    private $api;

    protected function setUp()
    {
        $this->api = CheckVatSoapApi::create(Wsdl::test());
    }

    /**
     * @test
     * @dataProvider vatNumbers
     */
    public function itChecksVat($vatNumber, $expectedValid)
    {
        $response = $this->api->checkVat(new CheckVatRequest('GB', $vatNumber));

        $this->assertEquals($expectedValid, $response->isValid());
    }

    public function vatNumbers()
    {
        return [
            'valid' => ['100', true],
            'invalid' => ['200', false]
        ];
    }
}
