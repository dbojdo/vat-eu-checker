<?php

namespace Goosfraba\ViesEuVatChecker;

interface CheckVatApi
{
    /**
     * @param CheckVatRequest $request
     * @return CheckVatResponse
     * @throws CheckVatException
     */
    public function checkVat(CheckVatRequest $request);
}
