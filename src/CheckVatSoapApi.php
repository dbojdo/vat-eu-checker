<?php

namespace Goosfraba\ViesEuVatChecker;

use Webit\SoapApi\Executor\SoapApiExecutor;
use Webit\SoapApi\Executor\SoapApiExecutorBuilder;

final class CheckVatSoapApi implements CheckVatApi
{
    /** @var SoapApiExecutor */
    private $executor;

    public function __construct(SoapApiExecutor $executor)
    {
        $this->executor = $executor;
    }

    /**
     * @inheritDoc
     */
    public function checkVat(CheckVatRequest $request)
    {
        try {
            $result = $this->executor->executeSoapFunction(
                'checkVat', [
                    'checkVat' => ['countryCode' => $request->countryCode(), 'vatNumber' => $request->vatNumber()]
                ]
            );
        } catch(\Exception $e) {
            throw new CheckVatException('Error during VAT checking.', null, $e);
        }

        return new CheckVatResponse(
            $result->countryCode,
            $result->vatNumber,
            date_create($result->requestDate),
            $result->valid,
            isset($result->name) ? $result->name : null,
            isset($result->address) ? $result->address :  null
        );
    }

    /**
     * Creates an instance of the API
     *
     * @param Wsdl|null $wsdl WSDL URL to be used (production by default)
     * @return CheckVatSoapApi
     */
    public static function create(Wsdl $wsdl = null)
    {
        $wsdl = $wsdl ?: Wsdl::production();

        $builder = SoapApiExecutorBuilder::create();
        $builder->setWsdl((string)$wsdl);

        return new self($builder->build());
    }
}
