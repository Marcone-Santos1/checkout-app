<?php

namespace MiniRest\Actions\Products;

use MiniRest\Contracts\IAction;
use MiniRest\Contracts\IRepository;
use MiniRest\Contracts\IRequest;
use MiniRestFramework\Http\Response\Response;

class GetAllProductsAction implements IAction
{

    public function handle(?IRequest $request, ?IRepository $repository, ?string $id): mixed
    {
        try {
            $product = $repository->get($request);
            return Response::json([
                'message' => 'success',
                'data' => [
                    'products' => $product
                ]
            ]);
        } catch (\Exception $e) {
            return Response::json(['error' => $e->getMessage()], 400);
        }
    }

}