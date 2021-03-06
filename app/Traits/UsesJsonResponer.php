<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\JsonResponse;

trait UsesJsonResponer
{
    protected int $httpStatusCode = 200;

    public function getHTTPStatusCode(): int
    {
        return $this->httpStatusCode;
    }

    public function setHTTPStatusCode(int $statusCode): self
    {
        $this->httpStatusCode = $statusCode;

        return $this;
    }

    public function respond(?array $data, array $headers = []): JsonResponse
    {
        return response()->json($data, $this->getHTTPStatusCode(), $headers);
    }

    public function respondOk(?array $data, array $headers = []): JsonResponse
    {
        return $this->setHTTPStatusCode(200)->respond($data, $headers);
    }

    public function respondNoData(?array $data, array $headers = []): JsonResponse
    {
        return $this->setHTTPStatusCode(204)->respond($data, $headers);
    }

    public function respondUnauthorized(string $message = 'Unauthorized access'): JsonResponse
    {
        return $this->setHTTPStatusCode(401)->respond(['error' => $message]);
    }

    public function respondNotFound(string $message = 'Resource not found'): JsonResponse
    {
        return $this->setHTTPStatusCode(404)->respond(['error' => $message]);
    }

    public function respondError(int $statusCode, string $message = 'Generic error'): JsonResponse
    {
        return $this->setHTTPStatusCode($statusCode)->respond(['error' => $message]);
    }

    public function respondValidatorFailed(array $errors = []): JsonResponse
    {
        return $this->setHTTPStatusCode(422)->respond(['errors' => 'Validation error', 'details' => $errors]);
    }
}
