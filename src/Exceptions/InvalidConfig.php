<?php

namespace Spatie\WebhookClient\Exceptions;

use Exception;
use Spatie\WebhookClient\ProcessWebhookJob;
use Spatie\WebhookClient\Storage\WebhookCallStorage;
use Spatie\WebhookClient\WebhookProfile\WebhookProfile;
use Spatie\WebhookClient\SignatureValidator\SignatureValidator;

class InvalidConfig extends Exception
{
    public static function couldNotFindConfig(string $notFoundConfigName): InvalidConfig
    {
        return new static("Could not find the configuration for `{$notFoundConfigName}`");
    }

    public static function invalidSignatureValidator(string $invalidSignatureValidator): InvalidConfig
    {
        $signatureValidatorInterface = SignatureValidator::class;

        return new static("`{$invalidSignatureValidator}` is not a valid signature validator class. A valid signature validator is a class that implements `{$signatureValidatorInterface}`.");
    }

    public static function invalidWebhookProfile(string $webhookProfile): InvalidConfig
    {
        $webhookProfileInterface = WebhookProfile::class;

        return new static("`{$webhookProfile}` is not a valid webhook profile class. A valid web hook profile is a class that implements `{$webhookProfileInterface}`.");
    }

    public static function invalidProcessWebhookJob(string $processWebhookJob): InvalidConfig
    {
        $abstractProcessWebhookJob = ProcessWebhookJob::class;

        return new static("`{$processWebhookJob}` is not a valid process webhook job class. A valid class should implement `{$abstractProcessWebhookJob}`.");
    }

    public static function invalidWebhookStorage(string $invalidWebhookStorage): InvalidConfig
    {
        $webhookStorageInterface = WebhookCallStorage::class;

        return new static("`{$invalidWebhookStorage}` is not a valid signature validator class. A valid storage is a class that implements `{$webhookStorageInterface}`.");
    }
}
