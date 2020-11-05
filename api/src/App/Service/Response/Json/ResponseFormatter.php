<?php

namespace WebOffice\App\Service\Response\Json;

use Symfony\Component\HttpFoundation\JsonResponse;

final class ResponseFormatter
{
    public function response(array $data, int $statusCode, bool $success = true, array $errors = []): JsonResponse
    {
        return new JsonResponse(
            [
                'success' => $success,
                'error' => $errors,
                'data' => $data,
                'meta' => ['project' => 'WebOffice', 'api' => '0.0.1'],
            ], $statusCode
        );
    }
}