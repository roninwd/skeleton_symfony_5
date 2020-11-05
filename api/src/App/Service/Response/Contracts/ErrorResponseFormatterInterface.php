<?php

namespace WebOffice\App\Service\Response\Contracts;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;

interface ErrorResponseFormatterInterface
{
    public function error(Throwable $exception, int $statusCode = Response::HTTP_BAD_REQUEST): JsonResponse;
}