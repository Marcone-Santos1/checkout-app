<?php

namespace MiniRest\Actions\Sales;

use MiniRest\Contracts\IAction;
use MiniRest\Contracts\IRepository;
use MiniRest\Contracts\IRequest;
use MiniRest\Models\Product;
use MiniRestFramework\Http\Response\Response;

class CreateSaleAction implements IAction
{

    public function handle(?IRequest $request, ?IRepository $repository, ?string $id): mixed
    {
        try {
            $sale = $repository->create($request);
            $repository->sync($sale, $this->productsArray($request->products));
            return Response::json([
                'message' => 'success',
                'data' => [
                    'sale' => $sale
                ]
            ]);
        } catch (\Exception $e) {
            return Response::json(['error' => $e->getMessage()], 400);
        }

    }

    private function productsArray(array $products): array
    {
        return array_map(function ($product) {

            $p = (new Product())->where('external_id', $product['product_id'])->first();

            return [
                'product_id' => $p->id,
                'amount' => $product['amount'],
                'unit_value' => $p->price
            ];
        }, $products);
    }
}