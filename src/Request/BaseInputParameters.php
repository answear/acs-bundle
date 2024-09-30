<?php

declare(strict_types=1);

namespace Answear\AcsBundle\Request;

class BaseInputParameters
{
    public function __construct(
        protected string $companyId,
        protected string $companyPassword,
        protected string $userId,
        protected string $userPassword,
        protected string $language,
    ) {
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
