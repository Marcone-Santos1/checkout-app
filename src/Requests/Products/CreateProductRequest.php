<?php

namespace MiniRest\Requests\Products;

use MiniRest\Traits\RequestTrait;
use MiniRest\Contracts\IRequest;
use MiniRestFramework\Http\Request\Request;

class CreateProductRequest extends Request implements IRequest
{
    use RequestTrait;

    private string $name;
    private float $value;

    /**
     * Define as regras de validação para esta requisição.
     *
     * @return array
     */
    protected function getValidationRules(): array
    {
        return [
            'name' => 'required|string',
            'value' => 'required'
        ];
    }


    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value
        ];
    }

}