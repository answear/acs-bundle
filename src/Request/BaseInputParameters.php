<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Request;

class BaseInputParameters
{
    protected string $companyId;
    protected string $companyPassword;
    protected string $userId;
    protected string $userPassword;
    protected string $language;

    public function __construct(string $companyId, string $companyPassword, string $userId, string $userPassword, string $language)
    {
        $this->companyId = $companyId;
        $this->companyPassword = $companyPassword;
        $this->userId = $userId;
        $this->userPassword = $userPassword;
        $this->language = $language;
    }

    public function toArray(): array
    {
        return [
            'Company_ID' => $this->companyId,
            'Company_Password' => $this->companyPassword,
            'User_ID' => $this->userId,
            'User_Password' => $this->userPassword,
            'language' => $this->language,
        ];
    }
}
