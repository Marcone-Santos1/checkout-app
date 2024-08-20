<?php

namespace MiniRest\Requests\Products;

use InvalidArgumentException;
use MiniRest\Contracts\IRequest;
use MiniRestFramework\Http\Request\Request;

class GetAllProductsRequest extends Request implements IRequest
{

    private string $name;
    private float $value;

    public function __construct(array $data)
    {
        parent::__construct();
        $this->name = $data['name'] ?? '';
        $this->value = $data['value'] ?? '';
    }

    public function __get($name)
    {
        if (property_exists($this, $name)) {
            return $this->$name;
        }

        throw new InvalidArgumentException("Property {$name} does not exist.");
    }


    /**
     * @throws \Exception
     */
    public function toValidate(): bool
    {
        return !$this->rules([
            'name' => 'required|string',
            'value' => 'required'
        ])->validate()->fails();
    }

    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'value' => $this->value
        ];
    }
}