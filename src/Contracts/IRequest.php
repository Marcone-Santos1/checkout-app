<?php

namespace MiniRest\Contracts;

interface IRequest
{
    public function __construct();

    public function isValid(): bool;

    public function toArray(): array;
}