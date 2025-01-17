<?php

namespace Spatie\WebhookClient\Models;

use Exception;
use Illuminate\Database\Eloquent\Model;

class EloquentWebhookCall extends Model implements WebhookCall
{
    protected $table = 'webhook_calls';

    public $guarded = [];

    protected $casts = [
        'payload' => 'array',
        'exception' => 'array',
    ];

    public function saveException(Exception $exception)
    {
        $this->exception = [
            'code' => $exception->getCode(),
            'message' => $exception->getMessage(),
            'trace' => $exception->getTraceAsString(),
        ];

        $this->save();

        return $this;
    }

    public function clearException()
    {
        $this->exception = null;

        $this->save();

        return $this;
    }

    /**
     * Return webhook's ID.
     *
     * @return string
     */
    public function getId(): string
    {
        return (string) $this->getKey();
    }

    /**
     * Returns called webhook's name.
     *
     * @return string
     */
    public function getName(): string
    {
        return (string) $this->name;
    }

    /**
     * Returns webhook's payload.
     *
     * @return array
     */
    public function getPayload(): array
    {
        return (array) $this->payload;
    }
}
