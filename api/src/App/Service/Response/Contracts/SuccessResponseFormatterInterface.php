<?php

namespace WebOffice\App\Service\Response\Contracts;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

interface SuccessResponseFormatterInterface
{
    public function collection(array $collection = [], int $statusCode = Response::HTTP_OK): JsonResponse;

    public function item(array $item = [], int $statusCode = Response::HTTP_OK): JsonResponse;
}