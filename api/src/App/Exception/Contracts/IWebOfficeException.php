<?php

namespace WebOffice\App\Exception\Contracts;

interface IWebOfficeException
{
    public function getStatusCode(): int;

    public function getMessage();

}