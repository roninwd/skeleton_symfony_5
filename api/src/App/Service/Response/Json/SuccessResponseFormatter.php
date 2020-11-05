<?php

declare(strict_types=1);

namespace WebOffice\App\Service\Response\Json;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use WebOffice\App\Service\Response\Contracts\SuccessResponseFormatterInterface;

class SuccessResponseFormatter implements SuccessResponseFormatterInterface
{
    /** @required */
    public ResponseFormatter $response;

    public function collection(array $collection = [], int $statusCode = Response::HTTP_OK): JsonResponse
    {
        return $this->success(['items' => $collection], $statusCode);
    }

    public function item(array $item = [], int $statusCode = Response::HTTP_OK): JsonResponse
    {
        return $this->success($item, $statusCode);
    }

    private function success(
        array $data = [],
        int $statusCode = Response::HTTP_OK
    ): JsonResponse {
        return $this->response->response($data, $statusCode, true, ["code" => $statusCode, "message" => ""]);
    }
}
