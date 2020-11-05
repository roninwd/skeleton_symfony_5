<?php

declare(strict_types=1);

namespace WebOffice\App\Service\Response\Json;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Throwable;
use WebOffice\App\Exception\Contracts\IWebOfficeException;
use WebOffice\App\Service\Response\Contracts\ErrorResponseFormatterInterface;

class ErrorResponseFormatter implements ErrorResponseFormatterInterface
{
    /** @required */
    public ResponseFormatter $response;

    public function error(Throwable $exception, int $statusCode = Response::HTTP_BAD_REQUEST): JsonResponse
    {
        if ($exception instanceof IWebOfficeException) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = $exception->getCode() ?: $statusCode;
        }

        $error = [
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
        ];

        return $this->response->response([], $statusCode, false, $error);
    }
}
