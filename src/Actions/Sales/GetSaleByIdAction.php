<?php

namespace MiniRest\Actions\Sales;

use MiniRest\Contracts\IAction;
use MiniRest\Contracts\IRepository;
use MiniRest\Contracts\IRequest;
use MiniRestFramework\Http\Response\Response;

class GetSaleByIdAction implements IAction
{

    public function handle(?IRequest $request, ?IRepository $repository, ?string $id): mixed
    {
        try {
            $product = $repository->getById($id);
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