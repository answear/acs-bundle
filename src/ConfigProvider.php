<?php

declare(strict_types=1);

namespace Answear\AcsBundle;

use Answear\AcsBundle\Request\BaseInputParameters;

class ConfigProvider
{
    private const API_URL = 'https://webservices.acscourier.net/ACSRestServices/api/ACSAutoRest';

    private string $apiKey;
    private string $companyId;
    private string $companyPassword;
    private string $userId;
    private string $userPassword;
    private string $language;

    public function __construct(
        string $apiKey,
        string $companyId,
        string $companyPassword,
        string $userId,
        string $userPassword,
        string $language
    ) {
        $this->apiKey = $apiKey;
        $this->companyId = $companyId;
        $this->companyPassword = $companyPassword;
        $this->userId = $userId;
        $this->userPassword = $userPassword;
        $this->language = $language;
    }

    public function getRequestHeaders(): array
    {
        return [
            'AcsApiKey' => $this->getApiKey(),
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

    private function getApiKey(): string
    {
        return $this->apiKey;
    }
}
