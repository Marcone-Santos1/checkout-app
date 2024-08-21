<?php

namespace MiniRest\Repositories;

use Illuminate\Support\Str;
use MiniRest\Contracts\IRepository;
use MiniRest\Contracts\IRequest;
use MiniRest\Models\PaymentType;
use MiniRest\Models\Product;
use MiniRest\Models\Sale;

class SalesRepository implements IRepository
{

    private Sale $sale;
    private PaymentType $paymentType;

    public function __construct(
        Sale $sale,
        PaymentType $paymentType
    )
    {
        $this->sale = $sale;
        $this->paymentType = $paymentType;
    }

    public function get(?IRequest $request)
    {
        return $this->sale->get();
    }

    public function getById(int|string $id)
    {
        return $this->sale->where('external_id', $id)->firstOrFail();
    }

    public function create(IRequest $request)
    {
        $paymentType = $this->paymentType->where('external_id', $request->payment_id)->first();

        return $this->sale->create([
            'payment_id' => $paymentType->id,
            'amount_paid' => $request->amount_paid,
        ]);
    }

    public function update(int|string $id, IRequest $request)
    {
        // Todo: implement after
    }

    public function delete(int|string $id)
    {
        $this->getById($id)->delete();
    }

    public function sync(Sale $sale, array $products)
    {
        $sale->products()->sync($products);
    }
}