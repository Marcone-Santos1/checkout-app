<?php

namespace MiniRest\Repositories;

use Illuminate\Support\Str;
use MiniRest\Contracts\IRepository;
use MiniRest\Contracts\IRequest;
use MiniRest\Models\Product;

class ProductsRepository implements IRepository
{

    private Product $product;

    public function __construct(
        Product $product
    )
    {
        $this->product = $product;
    }

    public function get(?IRequest $request)
    {
        return $this->product->get();
    }

    public function getById(int|string $id)
    {
        return $this->product->where('external_id', $id)->firstOrFail();
    }

    public function create(IRequest $request)
    {
        return $this->product->create([
            'name' => $request->name,
            'price' => $request->value,
        ]);
    }

    public function update(int|string $id, IRequest $request)
    {
        $product = $this->getById($id);
        $product->update([
            'name' => $request->name,
            'price' => $request->value,
        ]);

        return $product;
    }

    public function delete(int|string $id)
    {
        $this->getById($id)->delete();
    }
}