<?php

namespace MiniRest\Traits;

use Illuminate\Support\Str;

trait HasUuid
{
    /**
     * Inicializa o modelo com um UUID, se necessário.
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        if (!$this->exists && !$this->external_id) {

            $this->external_id = (string) Str::uuid();
        }
    }
}