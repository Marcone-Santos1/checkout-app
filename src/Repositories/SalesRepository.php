<?php

namespace MiniRest\Repositories;

use Illuminate\Support\Str;
use MiniRest\Contracts\IRepository;
use MiniRest\Contracts\IRequest;
use MiniRest\Models\Product;
use MiniRest\Models\Sale;

class SalesRepository implements IRepository
{

    private Sale $sale;

    public function __construct(
        Sale $sale
    )
    {
        $this->sale = $sale;
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
        return $this->sale->create([
            'name' => $request->name,
            'price' => $request->value,
        ]);
    }

    public function update(int|string $id, IRequest $request)
    {
        $sale = $this->getById($id);
        $sale->update([
            'name' => $request->name,
            'price' => $request->value,
        ]);

        return $sale;
    }

    public function delete(int|string $id)
    {
        $this->getById($id)->delete();
    }
}