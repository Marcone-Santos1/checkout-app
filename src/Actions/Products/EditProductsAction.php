<?php

namespace MiniRest\Actions\Products;

use MiniRest\Contracts\IAction;
use MiniRest\Contracts\IRepository;
use MiniRest\Contracts\IRequest;
use MiniRestFramework\Http\Response\Response;

class EditProductsAction implements IAction
{

    public function handle(?IRequest $request, ?IRepository $repository, ?string $id): mixed
    {
        try {
            $product = $repository->update($id, $request);
            return Response::json([
                'message' => 'success',
                'data' => [
                    'product' => $product
                ]
            ]);
        } catch (\Exception $e) {
            return Response::json(['error' => $e->getMessage()], 400);
        }

    }

}