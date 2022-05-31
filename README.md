# ACS stations bundle

ACS pickup point integration for Symfony.

## Installation

* install with Composer

```
composer require git@github.com:answear/acs-bundle.git
```

`Answear\AcsBundle\AnswearAcsBundle::class => ['all' => true],`  
should be added automatically to your `config/bundles.php` file by Symfony Flex.

## Setup

* provide required config data: `apiKey`, `companyId`, `companyId`, `userId`, `userPassword`

```yaml
# config/packages/answear_acs.yaml
answear_gls:
    apiKey:
    companyId:
    companyPassword:
    userId:
    userPassword:
    language: //default GR
```

## Usage

### Get ParcelShops

```php
/** @var \Answear\AcsBundle\Service\ParcelShopsService $parcelShopService **/
$parcelShopService->getList(CountryIdEnum $countryId, ?int $kind = null);
```

will return `\Answear\AcsBundle\Response\DTO\ParcelShop[]` array.

Where `countryId` is Greece or Cyprus, and `kind` is shop kind according to ACS documentation, `null` means all kinds

### Error handling

- `Answear\AcsBundle\Exception\ServiceUnavailable` for all `GuzzleException`
- `Answear\AcsBundle\Exception\MalformedResponse` for incorrect responses

Final notes
------------

Feel free to open pull requests with new features, improvements or bug fixes. The Answear team will be grateful for any comments.
