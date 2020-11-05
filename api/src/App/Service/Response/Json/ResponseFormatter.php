<?php

namespace WebOffice\App\Service\Response\Json;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Contracts\Translation\TranslatorInterface;

final class ResponseFormatter
{
    /** @required */
    public TranslatorInterface $translator;

    public function response(array $data, int $statusCode, bool $success = true, array $errors = []): JsonResponse
    {
        return new JsonResponse(
            [
                'success' => $success,
                'error' => $errors,
                'data' => $data,
                'meta' => [
                    'project' => $this->translator->trans('services.info', [], 'info'),
                    'api' => '0.0.1',
                    'locale' => $this->translator->getLocale(),
                ],
            ], $statusCode
        );
    }
}