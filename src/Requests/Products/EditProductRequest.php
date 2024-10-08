<?php

namespace MiniRest\Requests\Products;

use MiniRest\Contracts\IAction;
use MiniRest\Contracts\IRepository;
use MiniRest\Contracts\IRequest;
use MiniRest\Traits\RequestTrait;
use MiniRestFramework\Http\Request\Request;

class EditProductRequest extends Request implements IRequest
{
    use RequestTrait;

    private string $name;
    private float $value;

    protected function getValidationRules(): array
    {
        return [
            'name' => 'required|string',
            'value' => 'required'
        ];
    }
}