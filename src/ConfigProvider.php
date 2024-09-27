<?php

declare(strict_types=1);

namespace Answear\AcsBundle;

use Answear\AcsBundle\Request\BaseInputParameters;

readonly class ConfigProvider
{
    private const API_URL = 'https://webservices.acscourier.net/ACSRestServices/api/ACSAutoRest';

    public function __construct(
        private string $apiKey,
        private string $companyId,
        private string $companyPassword,
        private string $userId,
        private string $userPassword,
        private string $language,
    ) {
    }

    public function getRequestHeaders(): array
    {
        return [
            'AcsApiKey' => $this->apiKey,
            'Content-Type' => 'application/json',
        ];
    }

    public function getBaseInputParameters(): BaseInputParameters
    {
        return new BaseInputParameters($this->companyId, $this->companyPassword, $this->userId, $this->userPassword, $this->language);
    }

    public function getUrl(): string
    {
        return self::API_URL;
    }
}
