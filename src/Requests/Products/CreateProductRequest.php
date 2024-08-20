<?php

namespace MiniRest\Requests\Products;

use MiniRestFramework\Http\Response\Response;
use InvalidArgumentException;
use MiniRest\Contracts\IRequest;
use MiniRestFramework\Http\Request\Request;

class CreateProductRequest extends Request implements IRequest
{

    private string $name;
    private float $value;
    private array $data;

    public function __construct()
    {
        parent::__construct();

        $this->data = array_merge($this->getJsonData(), $this->getRouteParams());

        $this->name = $this->data['name'];
        $this->value = (float)$this->data['value'];

        $this->isValid();
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
    public function isValid(): bool
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