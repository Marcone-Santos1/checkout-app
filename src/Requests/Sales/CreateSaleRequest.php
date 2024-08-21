<?php

namespace MiniRest\Requests\Sales;

use MiniRest\Traits\RequestTrait;
use MiniRest\Contracts\IRequest;
use MiniRestFramework\Http\Request\Request;

class CreateSaleRequest extends Request implements IRequest
{
    use RequestTrait;

    private string $payment_id;
    private array $products;
    private float $amount_paid;

    /**
     * Define as regras de validação para esta requisição.
     *
     * @return array
     */
    protected function getValidationRules(): array
    {
        return [
            'payment_id' => 'required|string',
            'products' => 'required',
            'amount_paid' => 'required'
        ];
    }


    public function toArray(): array
    {
        return [
            'payment_id' => $this->payment_id,
            'products' => $this->products,
            'ammount_paid' => $this->amount_paid
        ];
    }

}