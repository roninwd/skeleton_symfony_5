<?php

namespace WebOffice\App\Exception;

use RuntimeException;
use Symfony\Component\HttpFoundation\Response;
use WebOffice\App\Exception\Contracts\IWebOfficeException;

class EntityNotFound extends RuntimeException implements IWebOfficeException
{
    public function __construct($message = "")
    {
        parent::__construct($message, Response::HTTP_NOT_FOUND, null);
    }

    public function getStatusCode(): int
    {
        return Response::HTTP_NOT_FOUND;
    }
}