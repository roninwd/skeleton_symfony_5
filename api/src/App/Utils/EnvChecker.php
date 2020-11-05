<?php

namespace WebOffice\App\Utils;

class EnvChecker
{
    public string $appEnv;

    public function isProd(): bool
    {
        return $this->appEnv === 'prod';
    }

    public function isDev(): bool
    {
        return $this->appEnv === 'dev';
    }

    public function getEnv(): string
    {
        return $this->appEnv;
    }
}